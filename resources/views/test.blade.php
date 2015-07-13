<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <div class  ="input-group">
  </div>
</br>
<form action="{{ URL::route('importemployee') }}" method ="POST" enctype="multipart/form-data">
  <p>Icon file </p>
  <input type="file" name ="file">
  <button type ="submit" name ="submit" class="btn btn-info" role="button"> Jave </button>
</form>
  </body>
  </html>