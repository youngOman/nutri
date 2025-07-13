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
 <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.min.css">
 <script src="bootstrap4/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
 <style>
   /* 全局樣式優化 */
   body {
     background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
     font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
     min-height: 100vh;
   }
   
   .container {
     background: rgba(255, 255, 255, 0.95);
     border-radius: 0 0 15px 15px;
     box-shadow: 0 4px 20px rgba(0,0,0,0.1);
     min-height: 100vh;
   }
   
   /* Banner 圖片優化 */
   .img-fluid {
     border-radius: 0 0 15px 15px;
     box-shadow: 0 2px 10px rgba(0,0,0,0.1);
   }
   
   /* 字體優化 */
   h1, h2, h3, h4, h5, h6 {
     color: #2c3e50;
     font-weight: 600;
   }
   
   /* 滾動條美化 */
   ::-webkit-scrollbar {
     width: 8px;
   }
   
   ::-webkit-scrollbar-track {
     background: #f1f1f1;
     border-radius: 4px;
   }
   
   ::-webkit-scrollbar-thumb {
     background: linear-gradient(135deg, #4a90e2, #357abd);
     border-radius: 4px;
   }
   
   ::-webkit-scrollbar-thumb:hover {
     background: linear-gradient(135deg, #357abd, #2968a3);
   }
   
   /* Logo 區域樣式 */
   .logo-section {
     text-align: center;
     padding: 15px 0;
     margin-bottom: 15px;
   }
   
   .logo-container {
     display: inline-block;
   }
   
   .logo-container .img-fluid {
     max-height: 80px;
     width: auto;
   }
   
   /* 工具導航區域樣式 */
   .tools-section {
     text-align: center;
     padding: 10px 0;
     margin-bottom: 20px;
     background: rgba(248, 249, 250, 0.5);
     border-radius: 10px;
   }
   
   .tools-nav {
     display: inline-flex;
     gap: 15px;
     align-items: center;
   }
   
   .tool-btn {
     display: flex;
     flex-direction: column;
     align-items: center;
     padding: 12px 16px;
     background: linear-gradient(135deg, #fff, #f8f9fa);
     border: 1px solid #e9ecef;
     border-radius: 10px;
     text-decoration: none;
     color: #495057;
     transition: all 0.3s ease;
     min-width: 90px;
     box-shadow: 0 2px 8px rgba(0,0,0,0.08);
   }
   
   .tool-btn:hover {
     background: linear-gradient(135deg, #4a90e2, #357abd);
     color: #fff;
     transform: translateY(-2px);
     box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
     text-decoration: none;
   }
   
   .tool-btn i {
     font-size: 20px;
     margin-bottom: 5px;
   }
   
   .tool-btn span {
     font-size: 12px;
     font-weight: 500;
     text-align: center;
   }
   
   /* 響應式設計 */
   @media (max-width: 768px) {
     .tools-nav {
       justify-content: center;
       width: 100%;
     }
     
     .tool-btn {
       min-width: 80px;
       padding: 10px 12px;
     }
     
     .tool-btn i {
       font-size: 18px;
     }
     
     .tool-btn span {
       font-size: 11px;
     }
   }
   
   @media (max-width: 576px) {
     .tools-nav {
       flex-direction: column;
       gap: 10px;
     }
     
     .tool-btn {
       flex-direction: row;
       width: 200px;
       justify-content: center;
       gap: 8px;
     }
     
     .tool-btn i {
       margin-bottom: 0;
       font-size: 16px;
     }
   }
 </style>