<h1><?php echo isset($id) ? "edit" : "new" ?></h1>
<?php echo \Config\Services::validation()->listErrors() ?>
<form action="/NewsController/store" method="POST">
  <div class="form-group">
    <label for="">Tilte</label>
    <input type="text" class="form-control" id="title" name="title"  value="<?php echo isset($title) ? $title : set_value("title" ) ?>"  >
  </div>
  <div class="form-group">
    <label for="">body</label>
    <input type="text" class="form-control" id="body" name="body" value="<?php echo isset($body) ? $body : set_value("body" )  ?>" >
  </div>
  <div class="form-group">
    <label for="">Slug</label>
    <input type="text" class="form-control" id="slug" name="slug" value="<?php echo isset($slug) ? $slug : set_value("slug")  ?>" >
  </div>
  <input type="hidden" name="id" value="<?php echo  isset($id) ? $id : set_value("id") ?>">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>