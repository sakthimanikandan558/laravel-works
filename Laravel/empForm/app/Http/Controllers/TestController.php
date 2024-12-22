<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TestController extends Controller
{
    public function test(Request $request){
        $data = [
            'profile_user_name' => 'Senthil',
            'picturePath' => 'https://km-horoscope-response.s3.us-west-2.amazonaws.com/resources/dist/img/maleavatar.gif',
            'mat_profile_id' => 'KM1416',
            'name' => 'Senthil',
            'years' => '29 yrs',
            'height' => '4ft 11in',
            'caste' => 'Knanaya Catholic',
            'degree' => 'All Bachelors in Engineering / Computers',
            'occupation' => 'Administrative Professional',
            'state' => 'Tamil Nadu',
            'country' => 'India',
            'gender' => 'M',
            'more_info' => 'Looking for a life partner from a well settled family.',
            'basic_details' => [
                'age' => '29 yrs and 7 months',
                'mother_tongue' => 'Kannada',
                'weight' => '50kg, Average',
                'marrital_status' => 'Never Married',
                'citizenship' => 'India',
                'lives_in' => 'Chennai, Tamil Nadu, India',
                'physical_status' => 'Normal'
            ],
            'religious_background_details' => [
                'religion' => 'Muslim - Sunni',
                'caste' => 'Knanaya Catholic',
                'sub_caste' => 'n',
                'denomination_background' => null,
                'if_gothra' => false,
                'gothra' => 'Bashan'
            ],
            'horoscope_details' => [
                'star' => 'Poorvaphalguni',
                'rashi' => 'Simmham / Simha (Leo)',
                'dosham' => 'Yes'
            ],
            'professional_details' => [
                'degree' => 'All Bachelors in Engineering / Computers',
                'employment_type' => 'Private',
                'designation' => 'Administrative Professional'
            ],
            'foodhabits_details' => [
                'food_habits' => 'Non Vegetarian',
                'smoking' => 'No',
                'drinking' => 'No'
            ],
            'family_background_details' => [
                'family_status' => 'Middle Class',
                'family_type' => 'Joint Family',
                'family_value' => 'Orthodox'
            ],
            'basic_expectations' => [
                'age' => '27 - 35 Yrs',
                'height' => '4ft 6in - 7ft',
                'marrital_status' => 'Never Married',
                'mother_tongue' => 'Tamil',
                'physical_status' => 'Normal',
                'eating_habits' => 'Vegetarian',
                'drinking_habits' => 'No',
                'smoking_habits' => 'No'
            ],
            'religious_expectations' => [
                'religion' => 'Christian',
                'show_denomination' => true,
                'denomination' => 'Malankara',
                'caste' => 'Chettiar, Devandra Kula Vellalar, Gounder',
                'sub_caste' => 'Musukama'
            ],
            'locations' => [
                'residing_country' => 'India',
                'residing_state' => 'Tamil Nadu',
                'residing_city' => 'Tibazah'
            ]
        ];

        
        $pdf = PDF::loadView('christianProfilePdf1', $data);
        
        // Render PDF to get its dimensions
        $pdf->render();
        $canvas = $pdf->getDomPDF()->get_canvas();
        $pdfHeight = $canvas->get_height();
        $totalPages = $pdf->getDomPDF()->get_canvas()->get_page_count();
        $totalHeight = round($pdfHeight * $totalPages);
        
        // Set the paper size to accommodate the entire content
        $pdf->setPaper([2220, 2000, 3393, $totalHeight], 'landscape');

        $fileName = 'samplepdf.pdf';
        return $pdf->download($fileName);
    }
}
