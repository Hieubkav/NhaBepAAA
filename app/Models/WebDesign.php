<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebDesign extends Model
{
    use HasFactory;

    protected $fillable = [
        // Footer section
        'footer_title',
        'footer_content1',
        'footer_content2',
        'footer_content3',
        'footer_content4',
        'footer_link1',
        'footer_link2',
        'footer_link3',
        'footer_link4',

        // Services section
        'service_status',
        'service_pic',
        'service_des',
        'service_title',
        'service_sub_logo_1',
        'service_sub_title_1',
        'service_sub_des_1',
        'service_sub_logo_2',
        'service_sub_title_2',
        'service_sub_des_2',
        'service_sub_logo_3',
        'service_sub_title_3',
        'service_sub_des_3',
        'service_sub_logo_4',
        'service_sub_title_4',
        'service_sub_des_4',

        // Vision section
        'vision_status',
        'vision_des',
        'vision_content_title_1',
        'vision_content_des_1',
        'vision_content_logo_1',
        'vision_content_title_2',
        'vision_content_des_2',
        'vision_content_logo_2',
        'vision_content_title_3',
        'vision_content_des_3',
        'vision_content_logo_3',

        // Map section
        'map_status',
        'map_title',
        'map_des',
        'map_link',
    ];

    protected $casts = [
        'service_status' => 'boolean',
        'vision_status' => 'boolean',
        'map_status' => 'boolean',
    ];
}
