<?php

namespace App\Modules\Influencer\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfluencerController extends Controller
{
    public function index()
    {
        // TODO: لیست اینفلوئنسرها برای ادمین
        return response()->json(['data' => []]);
    }

    public function me(Request $request)
    {
        // TODO: پروفایل اینفلوئنسر
        return response()->json(['data' => $request->user()]);
    }

    public function updateProfile(Request $request)
    {
        // TODO: ویرایش پروفایل اینفلوئنسر
        return response()->json(['status' => 'ok']);
    }

    public function myCampaigns(Request $request)
    {
        // TODO: لیست کمپین‌های اختصاص‌داده‌شده به این اینفلوئنسر
        return response()->json(['data' => []]);
    }

    public function acceptCampaign($campaignId)
    {
        // TODO: تغییر وضعیت کمپین → accepted
        return response()->json(['status' => 'accepted']);
    }

    public function rejectCampaign($campaignId)
    {
        // TODO: تغییر وضعیت کمپین → rejected
        return response()->json(['status' => 'rejected']);
    }

    public function uploadInsight(Request $request, $campaignId)
    {
        // TODO: ذخیره اینسایت (impressions, reach, clicks, screenshot و ...)
        return response()->json(['status' => 'ok']);
    }
}

