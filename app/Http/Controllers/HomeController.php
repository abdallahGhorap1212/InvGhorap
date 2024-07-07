<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\invoices;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //=================احصائية نسبة تنفيذ الحالات======================



        $count_all = invoices::count();
        $count_invoices1 = invoices::where('Value_Status', 1)->count();
        $count_invoices2 = invoices::where('Value_Status', 2)->count();
        $count_invoices3 = invoices::where('Value_Status', 3)->count();

        if ($count_invoices2 == 0) {
            $nspainvoices2 = 0;
        } else {
            $nspainvoices2 = $count_invoices2 / $count_all * 100;
        }

        if ($count_invoices1 == 0) {
            $nspainvoices1 = 0;
        } else {
            $nspainvoices1 = $count_invoices1 / $count_all * 100;
        }

        if ($count_invoices3 == 0) {
            $nspainvoices3 = 0;
        } else {
            $nspainvoices3 = $count_invoices3 / $count_all * 100;
        }

        $options = [
            'chart_title' => 'حالة الفواتير',
            'report_type' => 'group_by_string',
            'model' => '\App\Models\invoices', // يجب تعديل هذا وفقًا لنموذج الفواتير الخاص بك
            'group_by_field' => 'Status', // الحقل الذي سيتم تجميع البيانات بناءً عليه
            'chart_type' => 'bar',
            'chart_height' => 200,
            'chart_width' => 350,
            'data' => [
                [
                    "label" => "الفواتير الغير المدفوعة",
                    'backgroundColor' => '#ec5858',
                    'data' => $nspainvoices2
                ],
                [
                    "label" => "الفواتير المدفوعة",
                    'backgroundColor' => '#81b214',
                    'data' => $nspainvoices1
                ],
                [
                    "label" => "الفواتير المدفوعة جزئيا",
                    'backgroundColor' => '#ff9642',
                    'data' => $nspainvoices3
                ],
            ],
            'chart_options' => [],
        ];

        $chartjs = new LaravelChart($options);

        $options2 = [
            'chart_title' => 'Invoices Status',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\invoices', // يجب تعديل هذا وفقًا لنموذج الفواتير الخاص بك
            'group_by_field' => 'Status', // الحقل الذي سيتم تجميع البيانات بناءً عليه
            'chart_type' => 'pie',
            'chart_height' => 180,
            'chart_width' => 340,
            'data' => [
                [
                    'backgroundColor' => ['#ec5858', '#81b214', '#ff9642'],
                    'data' => [$nspainvoices2, $nspainvoices1, $nspainvoices3]
                ],
            ],
            'chart_options' => [],
        ];

        $chartjs_2 = new LaravelChart($options2);


        return view('home', compact('chartjs', 'chartjs_2'));
    }
}