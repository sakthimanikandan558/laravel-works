<!DOCTYPE html>
<html>

<head>
    <title>User Profile</title>      
    <style>
         body, html {
            margin: 0;
            padding: 0;
            inset: 0;
            position: relative;

        }   
        @font-face {
            font-family: 'Rubik';
            src: url('/fonts/Rubik-Medium.ttf') format('truetype');
            font-weight: 500; /* Regular weight */

        }

        @font-face {
            font-family: 'Alice';
            src: url('/fonts/Alice-Regular.ttf') format('truetype');
            font-weight: 500; /* Regular weight */
        }


        .pagesize {
            position: relative;
            width: 100%;
            height: 100vh;
        }

        .pagesize .backgroundimage {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-repeat: repeat-y;
            background-size: cover;
            z-index: -1;
            margin-top: -1;
            margin-bottom:-1;
        }

        .pagesize div {
            color: black;
        }


        @page {
            margin: 0px;
        }
       
        .header ,.content-bg-top ,.content-bg-middle ,.content-container{
            width: 100%;            
        }
        
        .content-bg-bottom{
            position: absolute;
            width: 100%;
            bottom: 0      
        }
        
        .profile-section{
            position: relative;
            width: 100%;
            height: 100%;
            z-index: 10;
        }   
        .profile-bg{
            position: absolute;            
            width: 75%;
            left: 12.5%;
            top:28%
        }  
        .first-middle-container{
            position: absolute;
            width: 100%;
        } 
        .profile-star{
            position: absolute;
            right:15%;
            width: 3rem;
            margin-top: 4rem
        }
        .profile-star2{
            position: absolute;
            left:15%;
            width: 3rem;
            margin-top: -4rem

        }
        .main-content {
        position: relative;
        background-image: url('images/muslim-pdf-bg-middle.svg');
        background-repeat:repeat-y;
        background-size: contain; 
        background-position: center;
        width: 100%;
        box-sizing: border-box;
        /* background: #F5F2EDE4; */
        
    }

        .profile-name{
        color: #3B5A12;
        text-transform: uppercase;
        font-family: 'Alice';
        font-size: 30px;
        letter-spacing: 0px;
        /* position: absolute; */
        text-align: center;
        justify-content: center;
        margin-top: 8rem ;
        margin-left: auto;
        margin-right: auto;
        }
        .profile-image{
            position: absolute;            
            width: 67%;
            height: 56%;
            left: 17%;
            top:29.5%;
            border-radius: 100%
        }
        .profile-details{
           margin: auto;  
           color: #000000;
           z-index: 99;
        }
        .profile-details-basic{
            color: #000000;
            font-family: 'Rubik', sans-serif;
            font-size: 23px; 
            font-weight: bolder;
        }
        .section-divider{
            width: 100%;
        }
        .table-label{
            color:#000000; 
            font-size: 23px;  
            font-family: 'Rubik';
        }
        .table-value{
            display:flex; 
            flex-wrap:wrap; 
            color:#000000; 
            font-size:23px;  
            font-family: 'Rubik'; 
            font-weight:bold;
             margin-top:5px;
        }
        .table-heading{
            color:#3B5A12;font-size: 25px
        }
        .table-container {
            width: 100%; /* Ensures that tables use full width */
            margin-bottom: 20px; /* Adds space between tables */
        }
        table {
            width: 100%; /* Ensures that table takes up full width of container */
            border-collapse: collapse; /* Ensures borders are collapsed for consistent spacing */
        }
        th, td {
            padding: 8px; /* Adds padding inside cells */
            text-align: left; /* Aligns text to the left */
        }
        .col-1, .col-2 {
            width: 50%; /* Adjust this to control the column width */
        }
    </style>
</head>


<body>
    <div class="">
        <img src="images/muslim-pdf-heading.png" alt="header" class="header">
    </div>
    <div class="content-container">
        <div class="profile-section">
            <img src="images/muslim-pdf-bg-top.png" alt="content-bg" class="content-bg-top">    
            <img src="images/muslim-pdf-profile-bg.png" alt="content-bg" class="profile-bg">                
            <img src="images/Path 9595.svg" alt="content-bg" class="profile-star">    
            <img src="" alt="Profile Picture" class="profile-image">                   
        </div>  
        <img src="images/muslim-pdf-bg-middle.svg" alt="content-bg-middle" class="content-bg-middle first-middle-container backgroundimage">  
        <div class="main-content page-size">    
            <div class="profile-details"> 
                <div class="profile-name">
                    <h2 style="text-align:center"> QAMARUNNISA</h2>
                </div>
                <div class="profile-details-basic" style="text-align:center;">
                    <p>Km</[]>    
                    <p>abcd</p>
                    <p>abcd</p>
                    <p>abcd</p>
                    <p>abcd</p>
                </div>    
                <img src="images/Path 9595.svg" alt="content-bg" class="profile-star2">                      
            </div> 
            <div class="" style="padding: 0 4rem 0 4rem">
                <div>
                <p class="table-heading">About Me</p>
                <p style="font-size:20px">abcd</p>
                </div>
                <img src="images/muslim-bg-section-divider.svg" alt="divider" class="section-divider"/>
                 {{-- basic details --}}
                <div style="margin-bottom: 2rem ">
                    <div class="table-heading">Basic Details</div>

                    <table>
                        <tr >
                            <td class="col-1">
                                <div>
                                    <div class="table-label">Mother Tongue</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                            <td class="col-2" >
                                <div>
                                    <div class="table-label"> Weight</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-1">
                                <div>
                                    <div class="table-label"> Marital Status</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                            <td class="col-2">
                                <div>
                                    <div class="table-label"> Citizenship</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-1">
                                <div>
                                    <div class="table-label"> Lives in</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                            <td class="col-2">
                                <div>
                                    <div class="table-label"> Physical Status</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Religious background --}}
                <div style="margin-bottom: 2rem ">
                    <div class="table-heading">Religious Background</div>
                    <table>
                        <tr>
                            <td class="col-1">
                                <div>
                                    <div class="table-label">Religion</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                            <td class="col-2">
                                <div>
                                    <div class="table-label">Caste</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                        <td class="col-1">
                            <div>
                                <div class="table-label">Sub-Caste</div>
                                <div class="table-value">abcd</div>
                            </div>
                        </td>
                        
                    </tr>
                        
                    </table>
                </div>
                {{-- Horoscope --}}
                <div style="margin-bottom: 2rem ">
                    <div class="table-heading">Horoscope</div>
                    <table>
                        <tr>
                            <td class="col-1">
                                <div>
                                    <div class="table-label">Star</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                            <td class="col-2">
                                <div>
                                    <div class="table-label">Rashi</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                        <td class="col-1">
                            <div>
                                <div class="table-label">Dosham</div>
                                <div class="table-value">abcd</div>
                            </div>
                        </td>
                        
                    </tr>
                        
                    </table>
                </div>
                {{-- Professional --}}
                <div style="margin-bottom: 2rem ">
                    <div class="table-heading">Professional</div>
                    <table>
                        <tr>
                            <td class="col-1">
                                <div>
                                    <div class="table-label">Degree</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                            <td class="col-2">
                                <div>
                                    <div class="table-label">Employment Type</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-1">
                                <div>
                                    <div class="table-label">Designation</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>                            
                        </tr>                      
                    </table>
                </div>
                {{-- Food and Habits --}}
                <div style="margin-bottom: 2rem ">
                    <div class="table-heading">Food and Habits</div>
                    <table>
                        <tr>
                            <td class="col-1">
                                <div>
                                    <div class="table-label">Diet Preferencese</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                            <td class="col-2">
                                <div>
                                    <div class="table-label">Smoking</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                        <td class="col-1">
                            <div>
                                <div class="table-label">Drinking</div>
                                <div class="table-value">abcd</div>
                            </div>
                        </td>
                        
                    </tr>
                        
                    </table>
                </div>
                {{-- Family Background --}}
                <div style="margin-bottom: 2rem ">
                    <div class="table-heading">Family Background</div>
                    <table>
                        <tr>
                            <td class="col-1">
                                <div>
                                    <div class="table-label">Family Status</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                            <td class="col-2">
                                <div>
                                    <div class="table-label">Family Type</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                        <td class="col-1">
                            <div>
                                <div class="table-label">Family Value</div>
                                <div class="table-value">abcd</div>
                            </div>
                        </td>
                        
                    </tr>
                        
                    </table>
                </div>
                <img src="images/muslim-bg-section-divider.svg" alt="divider" class="section-divider"/>

                {{-- Basic expectations --}}
                <div style="margin-bottom: 2rem ">
                    <div class="table-heading">Basic Expectations</div>
                    <table class="table2">
                        <tr>
                            <td class="col-1">
                                <div class="table-label">Age</div>
                            </td>
                            <td class="col-2">
                                <div class="table-value">abcd</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-1">
                                <div class="table-label">Height</div>
                            </td>
                            <td class="col-2">
                                <div class="table-value">abcd</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-1" >
                                <div class="table-label">Marital Status</div>
                            </td>
                            <td class="col-2">
                                <div class="table-value">abcd</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-1">
                                <div class="table-label">Mother Tongue</div>
                            </td>
                            <td class="col-2">
                                <div class="table-value">abcd</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-1">
                                <div class="table-label">Physical Status</div>
                            </td>
                            <td class="col-2">
                                <div class="table-value">abcd</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-1">
                                <div class="table-label">Eating Habits</div>
                            </td>
                            <td class="col-2">
                                <div class="table-value">abcd</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-1">
                                <div class="table-label">Drinking Habits</div>
                            </td>
                            <td class="col-2">
                                <div class="table-value">abcd</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-1">
                                <div class="table-label">Smoking Habits</div>
                            </td>
                            <td class="col-2">
                                <div class="table-value">abcd</div>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Religious preferences --}}
                <div style="margin-bottom: 2rem ">
                    <div class="table-heading">Religious Preferences</div>
                    <table >
                         <tr>
                            <td class="col-1" >
                                <div class="table-label">Religions</div>
                            </td>
                            <td class="col-2">
                                <div class="table-value">avcd</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-1">
                                <div class="table-label">Caste</div>
                            </td>
                            <td class="col-2">
                                <div class="table-value">abcd</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-1">
                                <div class="table-label">Sub-caste</div>
                            </td>
                            <td class="col-2">
                                <div class="table-value">abcd</div>

                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Location preferenced --}}
                <div style="margin-bottom: 2rem ">
                    <div class="table-heading">Location Preferences</div>
                    <table >
                         <tr>
                            <td class="col-1" >
                                <div class="table-label">Country</div>
                            </td>
                            <td class="col-2">
                                <div class="table-value">abcd</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-1">
                                <div class="table-label">Residing City</div>
                            </td>
                            <td class="col-2">
                                <div class="table-value">abcd</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-1">
                                <div class="table-label">Residing State</div>
                            </td>
                            <td class="col-2">
                                <div class="table-value">abcd</div>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>

        </div>
        <div class="footer">
            <img src="images/muslim-pdf-bg-bottom.svg" alt="content-bg-bottom" class="content-bg-bottom">   
        </div>    
                
    </div>      
   
</body>

</html>
<!-- <!DOCTYPE html>
<html>

<head>
    <title>User Profile</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            position: relative;
            background-image: url('images/Group 51337.png');
            background-repeat: repeat;
            background-size: cover;
            background-position: center;
            width: 100%;
            
            box-sizing: border-box;
        }

        .pagesize {
            position: relative;
            width: 100%;
            height: 100vh;
        }

        .backgroundimage {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-repeat: repeat-y;
            background-size: cover;
            z-index: -1;
        }

        @page {
            margin: 0;
        }

        .header, .content-bg-top, .content-bg-middle, .content-container {
            width: 100%;
        }

        .content-bg-bottom {
            position: absolute;
            width: 100%;
            bottom: 0;
        }

        .profile-section {
            position: relative;
            width: 100%;
            z-index: 10;
        }

        .profile-bg {
            position: absolute;
            width: 75%;
            left: 12.5%;
            top: 28%;
        }

        .first-middle-container {
            position: absolute;
            width: 100%;
        }

        .profile-star {
            position: absolute;
            right: 15%;
            width: 3rem;
            margin-top: 4rem;
        }

        .profile-star2 {
            position: absolute;
            left: 15%;
            width: 3rem;
            margin-top: -4rem;
        }

        .main-content {
            
        }

        .profile-name {
            color: #3B5A12;
            text-transform: uppercase;
            font-family: Alice;
            font-size: 30px;
            letter-spacing: 0px;
            text-align: center;
            justify-content: center;
            margin-top: 8rem;
            margin-left: auto;
            margin-right: auto;
        }

        .profile-image {
            position: absolute;
            width: 67%;
            height: 56%;
            left: 17%;
            top: 29.5%;
            border-radius: 100%;
        }

        .profile-details {
            margin: auto;
            color: #000000;
            z-index: 99;
        }

        .profile-details-basic {
            color: #000000;
            font-family: Rubik;
            font-size: 23px;
            font-weight: bolder;
        }

        .section-divider {
            width: 100%;
        }

        .table-label {
            color: #000000;
            font-size: 23px;
            font-family: 'Rubik';
        }

        .table-value {
            display: flex;
            flex-wrap: wrap;
            color: #000000;
            font-size: 23px;
            font-family: 'Rubik';
            font-weight: bold;
            margin-top: 5px;
        }

        .table-heading {
            color: #3B5A12;
            font-size: 25px;
        }

        .table-container {
            width: 100%;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        .col-1, .col-2 {
            width: 50%;
        }
    </style>
</head>

<body>
    <div>
        <img src="images/muslim-pdf-heading.png" alt="header" class="header">
    </div>
    <div class="content-container">
        <div class="profile-section">
            <img src="images/muslim-pdf-bg-top.png" alt="content-bg" class="content-bg-top">
            <img src="images/muslim-pdf-profile-bg.png" alt="content-bg" class="profile-bg">
            <img src="images/Path 9595.svg" alt="content-bg" class="profile-star">
            <img src="" alt="Profile Picture" class="profile-image">
        </div>
        <div class="main-content pagesize">
            <div class="profile-details">
                <div class="profile-name">
                    <h2 style="text-align:center"> NAME HEAD</h2>
                </div>
                <div class="profile-details-basic" style="text-align:center;">
                    <p>abcd</p>
                    <p>abcd</p>
                    <p>abcd</p>
                    <p>abcd</p>
                    <p>abcd</p>
                </div>
                <img src="images/Path 9595.svg" alt="content-bg" class="profile-star2">
            </div>
            <div style="padding: 0 10rem 0 10rem">
                <div>
                    <p class="table-heading">About Me</p>
                    <p style="font-size:20px">abcd</p>
                </div>
                <img src="images/muslim-bg-section-divider.svg" alt="divider" class="section-divider"/>
                <div style="margin-bottom: 2rem ">
                    <div class="table-heading">Basic Details</div>
                    <table>
                        <tr>
                            <td class="col-1">
                                <div>
                                    <div class="table-label">Mother Tongue</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                            <td class="col-2">
                                <div>
                                    <div class="table-label"> Weight</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-1">
                                <div>
                                    <div class="table-label"> Marital Status</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                            <td class="col-2">
                                <div>
                                    <div class="table-label"> Citizenship</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-1">
                                <div>
                                    <div class="table-label"> Lives in</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                            <td class="col-2">
                                <div>
                                    <div class="table-label"> Physical Status</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div style="margin-bottom: 2rem ">
                    <div class="table-heading">Religious Background</div>
                    <table>
                        <tr>
                            <td class="col-1">
                                <div>
                                    <div class="table-label">Religion</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                            <td class="col-2">
                                <div>
                                    <div class="table-label">Caste</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-1">
                                <div>
                                    <div class="table-label">Sub-Caste</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div style="margin-bottom: 2rem ">
                    <div class="table-heading">Horoscope</div>
                    <table>
                        <tr>
                            <td class="col-1">
                                <div>
                                    <div class="table-label">Star</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                            <td class="col-2">
                                <div>
                                    <div class="table-label">Rashi</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-1">
                                <div>
                                    <div class="table-label">Dosham</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div style="margin-bottom: 2rem ">
                    <div class="table-heading">Professional</div>
                    <table>
                        <tr>
                            <td class="col-1">
                                <div>
                                    <div class="table-label">Degree</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                            <td class="col-2">
                                <div>
                                    <div class="table-label">Employment Type</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-1">
                                <div>
                                    <div class="table-label">Occupation</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                            <td class="col-2">
                                <div>
                                    <div class="table-label">Annual Income</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-1">
                                <div>
                                    <div class="table-label"> Work location</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                            <td class="col-2">
                                <div>
                                    <div class="table-label"> Company Name</div>
                                    <div class="table-value">abcd</div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <img src="images/muslim-pdf-bg-bottom.svg" alt="content-bg" class="content-bg-bottom">
            </div>
        </div>
    </div>
</body>

</html> -->
