<?php 
/* General purpose stats
 * 
 * Adapted from a class written  by xPaw and forked by Goldman60
 * Website: http://xpaw.ru
 * GitHub: https://github.com/xPaw/PHP-Minecraft-Query
 */

class MC_stats_model extends CI_Model {
	private $Socket;
	private $Challenge;
	private $Players;
	private $Info;
	
	/**
	 * Connects
	 * 
	 * @param unknown_type $Ip
	 * @param unknown_type $Port
	 * @param unknown_type $Timeout
	 * 
	 * @return 
	 * 	-1 = Failed to recieve challenge
	 * 	-2 = Failed to recieve status
	 *  -3 = Can't open connection
	 *  TRUE = Success
	 */
	public function Connect( $Ip, $Port = 25565, $Timeout = 3 )
	{
		if( $this->Socket = FSockOpen( 'udp://' . $Ip, (int)$Port ) )
		{
			Socket_Set_TimeOut( $this->Socket, $Timeout );
	
			if( !$this->GetChallenge( ) )
			{
				FClose( $this->Socket );
				//throw new MinecraftQueryException( "Failed to receive challenge." );
				return -1;
			}
	
			if( !$this->GetStatus( ) )
			{
				FClose( $this->Socket );
				//throw new MinecraftQueryException( "Failed to receive status." );
				return -2;
			}
	
			FClose( $this->Socket );
			return TRUE;
			
		}
		else
		{
			//throw new MinecraftQueryException( "Can't open connection." );
			return -3;
			
		}
	}
	
	public function GetInfo( )
	{
		return isset( $this->Info ) ? $this->Info : false;
	}
	
	public function GetPlayers( )
	{
		return isset( $this->Players ) ? $this->Players : false;
	}
	
	private function GetChallenge( )
	{
		$Data = $this->WriteData( "\x09" );
	
		if( !$Data )
		{
			return false;
		}
	
		$this->Challenge = Pack( 'N', $Data );
	
		return true;
	}
	
	private function GetStatus( )
	{
		$Data = $this->WriteData( "\x00", $this->Challenge . "\x01\x02\x03\x04" );
	
		if( !$Data )
		{
			return false;
		}
	
		$Last = "";
		$Info = Array( );
	
		$Data = SubStr( $Data, 11 ); // splitnum + 2 int
		$Data = Explode( "\x00\x00\x01player_\x00\x00", $Data );
		$Players = SubStr( $Data[ 1 ], 0, -2 );
		$Data = Explode( "\x00", $Data[ 0 ] );
	
		// Array with known keys in order to validate the result
		// It can happen that server sends custom strings containing bad things (who can know!)
		$Keys = Array(
				'hostname' => 'HostName',
				'gametype' => 'GameType',
				'version' => 'Version',
				'plugins' => 'Plugins',
				'map' => 'Map',
				'numplayers' => 'Players',
				'maxplayers' => 'MaxPlayers',
				'hostport' => 'HostPort',
				'hostip' => 'HostIp'
		);
	
		foreach( $Data as $Key => $Value )
		{
			if( ~$Key & 1 )
			{
				if( !Array_Key_Exists( $Value, $Keys ) )
				{
					$Last = false;
					continue;
				}
	
				$Last = $Keys[ $Value ];
				$Info[ $Last ] = "";
			}
			else if( $Last != false )
			{
				$Info[ $Last ] = $Value;
			}
		}
	
		// Ints
		$Info[ 'Players' ] = IntVal( $Info[ 'Players' ] );
		$Info[ 'MaxPlayers' ] = IntVal( $Info[ 'MaxPlayers' ] );
		$Info[ 'HostPort' ] = IntVal( $Info[ 'HostPort' ] );
	
		// Parse "plugins", if any
		if( $Info[ 'Plugins' ] )
		{
			$Data = Explode( ": ", $Info[ 'Plugins' ], 2 );
	
			$Info[ 'RawPlugins' ] = $Info[ 'Plugins' ];
			$Info[ 'Software' ] = $Data[ 0 ];
	
			if( Count( $Data ) == 2 )
			{
				$Info[ 'Plugins' ] = Explode( "; ", $Data[ 1 ] );
			}
		}
		else
		{
			$Info[ 'Software' ] = 'Vanilla';
		}
	
		$this->Info = $Info;
	
		if( $Players )
		{
			$this->Players = Explode( "\x00", $Players );
		}
	
		return true;
	}
	
	private function WriteData( $Command, $Append = "" )
	{
		$Command = "\xFE\xFD" . $Command . "\x01\x02\x03\x04" . $Append;
		$Length = StrLen( $Command );
	
		if( $Length !== FWrite( $this->Socket, $Command, $Length ) )
		{
			return false;
		}
	
		$Data = FRead( $this->Socket, 1440 );
	
		if( StrLen( $Data ) < 5 || $Data[ 0 ] != $Command[ 2 ] )
		{
			return false;
		}
	
		return SubStr( $Data, 5 );
	}
	
	/**
	 * Reimplimentation of the function to get the server info
	 * @param sever to connect to $conn (defaults to localhost)
	 */
	public function GetDataForPages($conn = 'localhost') {
		$connection = $this->Connect($conn);
		
		if($connection === TRUE) {
			// Connection is good
			$data['PlayerList'] = $this->GetPlayers();
			$data['serverstats'] = $this->GetInfo();
			$data['connection'] = TRUE;
		} else {
			// Handles Connection errors
			$data['PlayerList'] = FALSE;
			$data['serverstats'] = FALSE;
			$data['connection'] = FALSE;
			switch($connection) {
				case(-3): {
					$data['Error'] = "Failed to receive challenge.";
				}
				case(-2): {
					$data['Error'] = "Failed to receive status.";
				}
				case(-1): {
					$data['Error'] = "Can't open connection.";
				}
			}
			$data['ErrorCode'] = $connection;
		}
		
		return $data;
	}
	
}