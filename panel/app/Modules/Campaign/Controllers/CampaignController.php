<?php

namespace App\Modules\Campaign\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        // TODO: لیست کمپین‌ها (با فیلتر نقش)
        return response()->json(['data' => []]);
    }

    public function store(Request $request)
    {
        // TODO: اعتبارسنجی و ایجاد کمپین جدید
        return response()->json(['status' => 'created'], 201);
    }

    public function show($id)
    {
        // TODO: نمایش جزئیات کمپین
        return response()->json(['data' => ['id' => $id]]);
    }

    public function update(Request $request, $id)
    {
        // TODO: ویرایش کمپین
        return response()->json(['status' => 'updated']);
    }

    public function destroy($id)
    {
        // TODO: حذف/آرشیو کمپین
        return response()->json(['status' => 'deleted']);
    }

    public function assignInfluencer($campaignId, $influencerId)
    {
        // TODO: انتساب اینفلوئنسر به کمپین
        return response()->json([
            'status' => 'assigned',
            'campaign_id' => $campaignId,
            'influencer_id' => $influencerId,
        ]);
    }
}

