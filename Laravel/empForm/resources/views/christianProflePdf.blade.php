<!DOCTYPE html>
<html>

<head>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>User Profile</title>
    <style>
        body,html {
            margin: 0;
            padding: 0;
            inset: 0;
            background-repeat: repeat-y;
            width: 100%;
            /* background: #FCF8ED; */
        }
        .header-container{
            width: 100%; 
            position: relative;
        }
        .header-img{
            width: 100%;
            z-index: 10;
            background: white
        }
        .top-flower{
            position: absolute;
            z-index: 1;
            left:9%;
            top:-8%;
        }
        .border-left{
            position: absolute;
            left: 0;
        }

        .border-right{
            position: absolute;
            right: 0;
        }
        .main-div-user-name{
            color: #214C00;
            font-weight:bolder;
            font-size: 30px;
            line-height: 30px;
        }
        .main-div-sub-text{
            color: #214C00;
            font-size: 19px;
            line-height: 40px;
        }
        .flower-left{
            /* position: absolute; */
            float: left;
            margin-left: 2.5%;
            width: 56%;
        }
        .flower-right{
            /* position: absolute; */
            float: right;
            margin-right: 2.5%;
            width: 56%;
        }
        .main-context-card{
            position: relative;
            margin-top: 15%;
            background: #FCF3DB;
            border: 5px solid #FBD4A3;
            border-radius: 32px;
            opacity: 1;
            width: 80%;
            display: flex !important;
            justify-content: center !important;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: -10%;
        }
        .card-div{
            padding: 15px;
            padding-left: 20px;
        }
        .card-headings{
            font-weight:bolder !important;
            font-size: 21px;
            letter-spacing: 0px;
            color: #3D7200;
            opacity: 1;
            margin-bottom:0px !important;
        }
        .card-text{
            font-size: 17px; 
        }
        .table-width{
            width: 100%;
        }
        .table-row{
            margin-top: 35px !important;
        }
        .table-data{
            margin-top: 16px !important;
        }
        .section-separator{
            width: 100% !important;
            text-align: center !important;
        }
        .main-details-heading{
            color:#6B6B6B; 
            font-size:15px;  
            font-weight: 100 !important;
            font-family: 'Rubik', sans-serif; 
        }
        .main-details-detail{
            display:flex; 
            flex-wrap:wrap; 
            color:#000000; 
            font-size:15px;  
            font-family: 'Rubik', sans-serif; 
            font-weight:bold; 
            margin-top:5px;
        }
        .sub-details-heading{
            color:#6B6B6B;
            font-size:15px;
            font-weight: 100 !important;
            font-family: 'Rubik', sans-serif; 
        }
        .sub-details-detail{
            display:flex; 
            flex-wrap:wrap; 
            color:#000000;
            font-size:15px;  
            font-family: 'Rubik', sans-serif; 
            font-weight:bold; 
            line-height: 23px;
            margin-top:5px;
        }
        .flower-bottom{
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        .profile-section{
            position: relative;
            width: 100%;
            z-index: 10;
        }
        .profile-image{           
            width: 51%;
            height: 26%;  
            top:16%;  
            left: 23%;
            border-radius: 100%;
            position: absolute;

        }      
        .profile-bg{
            width: 75%;
            position: absolute;
            top:9%;
            left: 10%
        
        }
        .profile-details{
        }
        .top-flower{
            position: absolute;
            z-index: 1;
            left:9%;
            top:-8%;
        }
    </style>
</head>
<body>
    <img src="images/2.svg" class="border-left">

    <img src="images/2.svg" class="border-right">
    <div class="" style="position: relative;">
        <div class="header-container">
            <img src="images/Group 51349.png" class="header-img">
            <img src="images/Group 51343.svg" class="top-flower"/>
        </div>           
        <div>
            <div class="profile-section">
                <img src="images/10922151.png" alt="content-bg" class="profile-bg">                
                <img src="{{$picturePath}}" alt="Profile Picture" class="profile-image">                   
            </div>   
        </div>  
        <div class="profile-details" style="position:absolute ;top:55%;left:auto;width:100%;margin:auto"> 
            <div class="main-div-user-name" style="text-align:center;">@if($name == null)@else{{$name}}@endif</div>
            <div class="main-div-sub-text" style="text-align:center;font-weight:100;">@if($mat_profile_id == null)@else Profile ID - {{$mat_profile_id}}@endif</div>
            <div class="main-div-sub-text" style="text-align:center;font-weight:100;">@if($years == null) @else{{$years}}@endif</div>
            <div class="main-div-sub-text" style="text-align:center;font-weight:100;">@if($height == null)@else{{$height}},@endif @if($caste == null)@else{{$caste}}@endif</div>
            <div class="main-div-sub-text" style="text-align:center;font-weight:100;">@if($degree == null)@else{{trim($degree)}} @endif</div>
            <div class="main-div-sub-text" style="text-align:center;font-weight:100;">@if($occupation == null )@else{{$occupation}}@endif</div>
        </div>
    </div>  
    <div style="position: relative">
    <div class="position:absolute; top:60%" style="width:100%">
        <div class="">   
            <img src="images/Group 216.svg" class="flower-left">

            <img src="images/Group 51324.svg" class="flower-right">    
        </div>
        <div class="main-context-card">
        
            <div class="card-div">
                <p class="card-headings">About me</p>
                <p class="card-text">@if($more_info == null )@else{{$more_info}}@endif</p>
            </div>

            <div class="section-separator">
                <img src="images/Group 51328.svg" class="" style="width: 75% !important;height: 5% !important;text-align: center !important;">
            </div>

            <div class="card-div">
                <p class="card-headings" style="margin-bottom:13px !important;">Basic Details</p>
                <div class="">
                    <table class="table-width">
                        <tr class="table-row">
                            <td style="width:50%">
                                <div>
                                    <div class="main-details-heading">Age</div>
                                    <div class="main-details-detail">@if($basic_details['age'] == null) - @else{{$basic_details['age']}}@endif </div>
                                </div>
                            </td>
                            <td class="table-data" style="width: 50%;">
                                <div>
                                    <div class="main-details-heading">Weight</div>
                                    <div class="main-details-detail">@if($basic_details['weight'] == null) - @else{{$basic_details['weight']}} @endif</div>
                                </div>
                            </td>
                        </tr>
                        <tr class="table-row">
                            <td style="width: 50%;">
                                <div class="table-data">
                                    <div class="main-details-heading">Marital Status</div>
                                    <div class="main-details-detail">@if($basic_details['marrital_status'] == null) - @else{{$basic_details['marrital_status']}}@endif</div>
                                </div>
                            </td>
                            <td style="width: 50%;">
                                <div class="table-data">
                                    <div class="main-details-heading">Citizenship</div>
                                    <div class="main-details-detail">@if($basic_details['citizenship']== null ) - @else{{$basic_details['citizenship']}}@endif</div>
                                </div>
                            </td>
                        </tr>
                        <tr class="table-row">
                            <td style="width: 50%;">
                                <div class="table-data">
                                    <div class="main-details-heading">Lives in</div>
                                    <div class="main-details-detail">@if($basic_details['lives_in'] == null) - @else{{$basic_details['lives_in']}}@endif</div>
                                </div>
                            </td>
                            <td style="width: 50%;">
                                <div class="table-data">
                                    <div class="main-details-heading">Physical Status</div>
                                    <div class="main-details-detail">@if($basic_details['physical_status'] == null) - @else{{$basic_details['physical_status']}}@endif</div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card-div" style="padding-top:0px !important;margin-top:-5px">
                <p class="card-headings" style="margin-bottom:13px !important;">Religious Background</p>
                <div class="">
                    <table class="table-width">
                        <tr class="table-row">
                            <td style="width:50%">
                                <div>
                                    <div class="main-details-heading">Religion</div>
                                    <div class="main-details-detail">@if($religious_background_details['religion'] == null) - @else{{$religious_background_details['religion']}}@endif </div>
                                </div>
                            </td>
                            <td class="table-data" style="width: 50%;">
                                <div>
                                    <div class="main-details-heading">caste</div>
                                    <div class="main-details-detail">@if($religious_background_details['caste'] == null) - @else{{$religious_background_details['caste']}} @endif</div>
                                </div>
                            </td>
                        </tr>
                        <tr class="table-row">
                            <td style="width: 50%;">
                                <div class="table-data">
                                    <div class="main-details-heading">Sub-Caste</div>
                                    <div class="main-details-detail">@if($religious_background_details['sub_caste'] == null) - @else{{$religious_background_details['sub_caste']}}@endif</div>
                                </div>
                            </td>
                            <td style="width: 50%;">
                                <div class="table-data">
                                    <div class="main-details-heading"></div>
                                    <div class="main-details-detail"></div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card-div" style="padding-top:0px !important;margin-top:-5px">
                <p class="card-headings" style="margin-bottom:13px !important;">Horocope</p>
                <div class="">
                    <table class="table-width">
                        <tr class="table-row">
                            <td style="width:50%">
                                <div>
                                    <div class="main-details-heading">Star</div>
                                    <div class="main-details-detail">@if($horoscope_details['star'] == null) - @else{{$horoscope_details['star']}}@endif </div>
                                </div>
                            </td>
                            <td class="table-data" style="width: 50%;">
                                <div>
                                    <div class="main-details-heading">Rashi</div>
                                    <div class="main-details-detail">@if($horoscope_details['rashi'] == null) - @else{{$horoscope_details['rashi']}} @endif</div>
                                </div>
                            </td>
                        </tr>
                        <tr class="table-row">
                            <td style="width: 50%;">
                                <div class="table-data">
                                    <div class="main-details-heading">Dosham</div>
                                    <div class="main-details-detail">@if($horoscope_details['dosham'] == null) - @else{{$horoscope_details['dosham']}}@endif</div>
                                </div>
                            </td>
                            <td style="width: 50%;">
                                <div class="table-data">
                                    <div class="main-details-heading"></div>
                                    <div class="main-details-detail"></div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card-div" style="padding-top:0px !important;margin-top:-5px">
                <p class="card-headings" style="margin-bottom:13px !important;">Food and Habits</p>
                <div class="">
                    <table class="table-width">
                        <tr class="table-row">
                            <td style="width:50%">
                                <div>
                                    <div class="main-details-heading">Diet Preferences</div>
                                    <div class="main-details-detail">@if($foodhabits_details['food_habits'] == null) - @else{{$foodhabits_details['food_habits']}}@endif </div>
                                </div>
                            </td>
                            <td class="table-data" style="width: 50%;">
                                <div>
                                    <div class="main-details-heading">Smoking</div>
                                    <div class="main-details-detail">@if($foodhabits_details['smoking'] == null) - @else{{$foodhabits_details['smoking']}} @endif</div>
                                </div>
                            </td>
                        </tr>
                        <tr class="table-row">
                            <td style="width: 50%;">
                                <div class="table-data">
                                    <div class="main-details-heading">Drinking</div>
                                    <div class="main-details-detail">@if($foodhabits_details['drinking'] == null) - @else{{$foodhabits_details['drinking']}}@endif</div>
                                </div>
                            </td>
                            <td style="width: 50%;">
                                <div class="table-data">
                                    <div class="main-details-heading"></div>
                                    <div class="main-details-detail"></div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card-div" style="padding-top:0px !important;margin-top:-5px">
                <p class="card-headings" style="margin-bottom:13px !important;">Family Background</p>
                <div class="">
                    <table class="table-width">
                        <tr class="table-row">
                            <td style="width:50%">
                                <div>
                                    <div class="main-details-heading">Family Status</div>
                                    <div class="main-details-detail">@if($family_background_details['family_status'] == null) - @else{{$family_background_details['family_status']}}@endif </div>
                                </div>
                            </td>
                            <td class="table-data" style="width: 50%;">
                                <div>
                                    <div class="main-details-heading">Family Type</div>
                                    <div class="main-details-detail">@if($family_background_details['family_type'] == null) - @else{{$family_background_details['family_type']}} @endif</div>
                                </div>
                            </td>
                        </tr>
                        <tr class="table-row">
                            <td style="width: 50%;">
                                <div class="table-data">
                                    <div class="main-details-heading">Family Value</div>
                                    <div class="main-details-detail">@if($family_background_details['family_value'] == null) - @else{{$family_background_details['family_value']}}@endif</div>
                                </div>
                            </td>
                            <td style="width: 50%;">
                                <div class="table-data">
                                    <div class="main-details-heading"></div>
                                    <div class="main-details-detail"></div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="section-separator" style="margin-top:3%;margin-bottom:2%">
                <img src="images/Group 51328.svg" class="" style="width: 75% !important;height: 5% !important;text-align: center !important;">
            </div>

            <div class="card-div">
                <div class="card-headings" style="margin-bottom:13px !important;">Basic Expectations</div>
                <table class="table2" style="width:100%;">
                    <tr style="width: 100%;">
                        <td style="width: 35%;">
                            <div class="sub-details-heading">Age</div>
                        </td>
                        <td style="width: 75%;">
                            <div class="sub-details-detail"> @if($basic_expectations['age'] == null) Any @else {{$basic_expectations['age']}}@endif</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;">
                            <div class="sub-details-heading">Height</div>
                        </td>
                        <td>
                            <div class="sub-details-detail">@if($basic_expectations['height'] == null) Any @else {{$basic_expectations['height']}} @endif</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 40%;">
                            <div class="sub-details-heading">Marital Status</div>
                        </td>
                        <td>
                            <div class="sub-details-detail">@if($basic_expectations['marrital_status'] == null) Any @else {{$basic_expectations['marrital_status']}} @endif</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 40%;">
                            <div class="sub-details-heading">Mother Tongue</div>
                        </td>
                        <td>
                            <div class="sub-details-detail">@if($basic_expectations['mother_tongue'] == null) Any @else {{$basic_expectations['mother_tongue']}} @endif</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 40%;">
                            <div class="sub-details-heading">Physical Status</div>
                        </td>
                        <td>
                            <div class="sub-details-detail">@if($basic_expectations['physical_status'] == null) Any @else {{$basic_expectations['physical_status']}} @endif</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 40%;">
                            <div class="sub-details-heading">Eating Habits</div>
                        </td>
                        <td>
                            <div class="sub-details-detail">@if($basic_expectations['eating_habits'] == null) Any @else {{$basic_expectations['eating_habits']}}@endif </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 40%;">
                            <div class="sub-details-heading">Drinking Habits</div>
                        </td>
                        <td>
                            <div class="sub-details-detail">@if($basic_expectations['drinking_habits'] == null) Any @else {{$basic_expectations['drinking_habits']}} @endif</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:40%">
                            <div class="sub-details-heading">Smoking Habits</div>
                        </td>
                        <td>
                            <div class="sub-details-detail">@if($basic_expectations['smoking_habits'] == null) Any @else {{$basic_expectations['smoking_habits']}} @endif</div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="card-div" style="padding-top:6px">
                <div class="card-headings" style="margin-bottom:13px !important;">Religious Expectations</div>
                <table class="table2" style="width:100%;">
                    <tr style="width: 100%;">
                        <td style="width: 35%;">
                            <div class="sub-details-heading">Religion</div>
                        </td>
                        <td style="width: 75%;">
                            <div class="sub-details-detail"> @if($religious_expectations['religion'] == null) Any @else {{$religious_expectations['religion']}}@endif</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;">
                            <div class="sub-details-heading">Caste</div>
                        </td>
                        <td>
                            <div class="sub-details-detail">@if($religious_expectations['caste'] == null) Any @else {{$religious_expectations['caste']}} @endif</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 40%;">
                            <div class="sub-details-heading">Sub-caste</div>
                        </td>
                        <td>
                            <div class="sub-details-detail">@if($religious_expectations['sub_caste'] == null) Any @else {{$religious_expectations['sub_caste']}} @endif</div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="card-div" style="padding-top:6px;padding-bottom:20%">
                <div class="card-headings" style="margin-bottom:13px !important;">Location</div>
                <table class="table2" style="width:100%;">
                    <tr style="width: 100%;">
                        <td style="width: 35%;">
                            <div class="sub-details-heading">Country</div>
                        </td>
                        <td style="width: 75%;">
                            <div class="sub-details-detail"> @if($locations['residing_country'] == null) Any @else {{$locations['residing_country']}}@endif</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;">
                            <div class="sub-details-heading">Residing City</div>
                        </td>
                        <td>
                            <div class="sub-details-detail">@if($locations['residing_city'] == null) Any @else {{$locations['residing_city']}} @endif</div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    </div>

    <div class="flower-bottom" style="width:100%">
        <img src="images/Group 51327.svg"  style="width:100%">
    </div>

    

</body>

</html>