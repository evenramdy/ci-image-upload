<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CI Image Upload</title>

	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap-theme.min.css">

	<script src="lib/bootstrap/js/jquery.min.js"></script>
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
        <!-- Static navbar -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">CI Image Upload</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
        </nav>
        <!-- Main component for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1><span class="badge">BLOB</span> Image upload to DB example</h1>
            <p>This example is a quick exercise to illustrate how to insert blob record to DB. It includes the form of simple file upload.</p>
        </div>

        <div class="row">
        	<div class="col-md-12">

		        <?php echo form_open_multipart('upload'); ?>
	        		<div class="panel panel-default">
	        			<div class="panel-heading">
	        				<strong>
		        				Form image upload
	        				</strong>
	        			</div>
	        			<div class="panel-body">
				        	<div class="form-group">
				        		<label class="control-label">Upload image</label>
				        		<input type="file" name="userfile" class="form-control"></input>
				        	</div>
	        			</div>
	        			<div class="panel-footer">
				    		<button type="submit" class="btn btn-primary" value="upload">Submit</button>
	        			</div>
	        		</div>
		        </form>

		        <?php echo $notification; ?>

        		<?php if (sizeof($images) > 0) : ?>
		        	<div class="panel panel-default">
	        			<div class="panel-heading">
	        				<strong>
		        				Recently uploaded images
	        				</strong>
	        			</div>
	        			<div class="panel-body">
	        				<?php foreach($images as $image) : ?>
	        					<div class="col-md-4">
		        					<div class="panel panel-info text-center" style="background-color: rgba(0,0,0,.02);">
		        						<div class="panel-body" style="padding:5px;">
		        							<img style="height: 200px; margin: auto;"
		        								class="img-responsive"
		        								src="<?php echo site_url('get/' . $image->id); ?>" />
		        						</div>
		        						<div class="panel-footer">
		        							<small><?php echo $image->title; ?></small> | 
		        							<a href="<?php echo site_url('delete/' . $image->id); ?>">
		        								<small>Remove</small>
		        							</a>
		        						</div>
		        					</div>
	        					</div>
	        				<?php endforeach; ?>
	        			</div>
	    			</div>
        		<?php endif; ?>

        	</div>
        </div>
    </div> 
</body>
</html>