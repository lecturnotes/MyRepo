<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
    <style>
        preview-container { display: flex; flex-wrap: wrap; justify-content: space-between; } .preview-image { width: calc(33% - 10px); margin: 10px; border: 1px solid #ddd; } .preview-image img { width: 100%; height: auto; }
    </style>    
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select Image Files to Upload:
    <input type="file" name="files[]" id="image-upload" multiple >
    <input type="submit" name="submit" value="UPLOAD">
</form>
<div id="preview-container"></div>

<script>

function DisplayImage(imageUrl) { 
    window.open(imageUrl, 'preview', 'width=600,height=600'); 
} 

const imageUpload = document.getElementById('image-upload');
const previewContainer = document.getElementById('preview-container');
let previewImages = [];

imageUpload.addEventListener('change', (event) => {
    //alert("hello");
  const selectedFiles = event.target.files;
  //alert(selectedFiles.length);
  // Loop through each selected file and create a preview image element.111
  for (let i = 0; i < selectedFiles.length; i++) {
    //alert(selectedFiles[i]);
    const reader = new FileReader();
    reader.readAsDataURL(selectedFiles[i]); // Convert the selected file to base64 format for previewing.
    //alert(readta);
    reader.onloadend = () => {  PreviewImages[i] = document.createElement('img'); PreviewImages[i].src = reader.result; 
        PreviewImages[i].alt = selectedFiles[i].name; 
        PreviewImages[i].classList.add('preview-image'); 
        PreviewImages[i].addEventListener('click', () => {  DisplayImage(reader.result); }); 
        previewContainer.appendChild(PreviewImages[i]); }; 
    } 
}); 


</script>
</body>
</html>