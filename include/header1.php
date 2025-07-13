<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <meta charset="UTF-8">
    <title>台灣食品營養成分資料庫查詢系統</title>
 <script
 src="https://code.jquery.com/jquery-3.4.1.min.js"
 integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
 crossorigin="anonymous"></script>
 <script src="https://kit.fontawesome.com/00d42e4480.js" crossorigin="anonymous"></script>
 <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.min.css">
 <script src="bootstrap4/js/bootstrap.min.js"></script>
 <style>
   /* 全頁面 LOGO 區域樣式 */
   .logo-header-container {
     width: 100vw;
     position: relative;
     left: 50%;
     right: 50%;
     margin-left: -50vw;
     margin-right: -50vw;
     background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
     padding: 0;
     text-align: center;
     box-shadow: 0 2px 10px rgba(0,0,0,0.1);
   }
   
   .logo-header-container a {
     display: inline-block;
     width: 100%;
   }
   
   .logo-header-container .img-fluid {
     width: 100%;
     max-width: 100%;
     height: auto;
     display: block;
     margin: 0 auto;
   }
   
   /* 響應式設計 */
   @media (max-width: 991px) {
     .logo-header-container .img-fluid {
       max-height: 120px;
       width: auto;
     }
   }
   
   @media (min-width: 992px) {
     .logo-header-container .img-fluid {
       max-height: 150px;
       width: auto;
     }
   }
 </style>