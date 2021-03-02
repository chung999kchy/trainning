
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <base href ="http://localhost/ex1/" />
        <meta charset="UTF-8">
        <title>Add Page</title>
        <link rel="stylesheet" type="text/css" href="view/css/base.css">
        <link rel="stylesheet" type="text/css" href="view/css/index.css">
        
</head>
<body>
    <?php
//        echo ("Chao em");
    include_once '../utils/Config.php';
    include_once '../controller/PostBLL.php';
    ?>
    <header>
        <div class ='headPage'>
            <div class="namePage"> Add </div>
            <div>
                <button onclick="goBack()" class='btn'> Back </button>
            </div>

            <script>
                function goBack() {
                    window.history.back();
                }

            </script>
        </div>
    </header>

    <div class ='department' ></div>

    <div class = 'container'>
        <form action="controller/NewPost.php" method="POST" class="editForm" enctype="multipart/form-data">
            <div class="bg-gray">
                <div>Title</div>
                <input type="text" name="title" placeholder="title" style="width: 400px;height: 25px"/>                    
            </div>
            <div>
                <div>Description</div>
                <textarea name="description" placeholder="description" rows="7" cols="80"></textarea>                    
            </div>
            <div  class="bg-gray">
                <div>Image</div>
                <div>
                    <input name="file" type="file" accept="image/*" onchange="loadFile(event)">
                    <img id="output" style = "width: 150px;" src="" />
                    <script>
                        var loadFile = function (event) {
                            var reader = new FileReader();
                            reader.onload = function () {
                                var output = document.getElementById('output');
                                output.src = reader.result;
                            };
                            reader.readAsDataURL(event.target.files[0]);
                        };
                    </script>
                </div>
            </div>
            <div>
                <div>Status</div>
                <select name="status">
                    <option value="1">Enabled</option>
                    <option value="0">Disabled</option>
                </select>                   
            </div>
            <div class="bg-gray">
                <div></div>
                <input type="submit" value="Submit" style="height: 25px; width: 77px;"/>                
            </div>
        </form>
    </div>
</body>
</html>
