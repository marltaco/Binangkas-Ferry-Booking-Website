<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="icon" href="img/ferrylogo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <title>Article | Binangkas</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        .container-1 h3 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
            padding-left: 10%;
        }

        .container-1 p {
            font-size: 18px;
            color: #666;
            line-height: 1.6;
            max-width: 60%;
            padding-left: 10%;
        }

        .image-1 img {
            max-width: 60%;
            display: block;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container-2{
            margin-left: 20%;
            margin-right: 20%;
            padding-left: 50px;

        }
        .container-2 p{ 
            
            max-width: 80%;
            
        }
        .image-container {
            display: flex;
            margin: 20px auto;
            max-width: 800px;
           
        }


        .image-container img {
            max-width: 50%; 
            margin-right: 50px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 20px;
            display: inline-block;
            vertical-align: top;
            width: calc(20.33%);
            margin-right: 5px; 
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }

        em {
            display: block;
            font-style: italic;
            margin-bottom: 5px;
        }

        small {
            display: block;
            color: #666;
        }

       
        li:last-child {
            margin-right: 0;
        }
        
        .container-3{
            margin-left: 20%;
        }
    </style>
</head>
<body>
    <?php include "script/header.php";?>
    <div class="container-1">
        <h3>Article Or Post</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque saepe facere iusto totam doloribus aliquam. Reprehenderit ratione ab, dolores, quis quibusdam atque maiores perferendis, ex sed accusamus maxime eaque rerum!</p>
    </div>
   <div class="image-1">
     <img src="ferrie.jpg" alt="A ferry sailing on water">
   </div>
    <div class="container-2">
        <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad suscipit, eos earum reiciendis, sequi, dicta sint quae in quaerat error consequuntur? Aperiam molestiae omnis voluptatum a ea rem exercitationem commodi. 
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam adipisci est blanditiis repellendus suscipit, iusto fugiat. Eos eius aut quisquam ducimus, earum nobis! Error doloribus et ducimus porro blanditiis accusantium?
        </p>
    </div>
    <div class="image-container">
        <img src="th.jpg" alt="Bangka 1">
        <img src="th.jpg" alt="Bangka 2">
    </div>
    <div class="container-2">
        <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad suscipit, eos earum reiciendis, sequi, dicta sint quae in quaerat error consequuntur? Aperiam molestiae omnis voluptatum a ea rem exercitationem commodi. 
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam adipisci est blanditiis repellendus suscipit, iusto fugiat. Eos eius aut quisquam ducimus, earum nobis! Error doloribus et ducimus porro blanditiis accusantium?
        </p>
    </div>
    
    <div class="container-3">
        <h3>Related Articles or Posts</h3>
        <ul>
            <li>
                <img src="th.jpg" alt="Bangka 1">
                <em>Title 1</em>
                <small>Author 1</small>
            </li>
            <li>
                <img src="th.jpg" alt="Bangka 2">
                <em>Title 2</em>
                <small>Author 2</small>
            </li>
            <li>
                <img src="th.jpg" alt="Bangka 3">
                <em>Title 3</em>
                <small>Author 3</small>
            </li>
        </ul>
    </div>
    <?php include "script/footer.php";?>
    <script src="js/header.js"> </script>
</body>
</html>
