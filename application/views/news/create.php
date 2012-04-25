<h2>Create a news item</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/create') ?>

	<label for="title">Title</label>
	<input type="text" name="title"/> <br />
	
	<label for="text">Text</label>
	<textarea name="text"></textarea> <br />
	
	<label for="author">Author</label>
	<input type="radio" name="author" value="<?php echo $user[0]->username; ?>" checked="checked" /><?php echo $user[0]->username; ?><br /> 
	<input type="submit" name="submit" value="Create news item" />
	
</form>