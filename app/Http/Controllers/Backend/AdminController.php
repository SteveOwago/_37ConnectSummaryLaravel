<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PdfReport;
use CSVReport;
use ExcelReport;

class AdminController extends Controller
{
    public function index(){

        $statusValid = \DB::table('incoming_messages')->where('status','valid')->get();
        $statusInvalid = \DB::table('incoming_messages')->where('status','invalid')->get();
        $statusOther = \DB::table('incoming_messages')->where('status','!=','invalid')->where('status','!=','valid')->get();

        $participants = \DB::table('participants')->get();

        $regions = \DB::table('regions')->get();

        $outgoingMessages = \DB::table('outgoing_messages')->get();

        
        return view('admin.dashboard',['statusValid' => $statusValid,'statusInvalid' => $statusInvalid ,
                                        'statusOther' => $statusOther, 'participants' => $participants ,
                                        'regions' => $regions, 'outgoingMessages' => $outgoingMessages
                                    ]);
    }

    //Fetch reports
    public function reports(){

        //Get List of Blacklisted Users
        $blacklists = \DB::table('blacklist')->get();

        return view('admin.reports', compact('blacklists'));
    }

    public function generatePdf(){

        $title = 'Blacklisted Users'; // Report title

        $meta = [ // For displaying filters description on header
            'Date' => \Carbon\Carbon::today()->format('d M Y'),
        
        ];

        $queryBuilder = \DB::table('blacklist')->select(['name','phone']);

        $columns = [ // Set Column to be displayed
            'Name' => 'name',
            'Mobile Number' => 'phone' ,// if no column_name specified, this will automatically seach for snake_case of column name (will be registered_at) column from query result
        ];

        // Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
        return PdfReport::of($title, $meta, $queryBuilder, $columns)
                        ->editColumn('Name', [ // Change column class or manipulate its data for displaying to report
                            'class' => 'left'
                        ])
                        //->limit(20)// Limit record to be showed
                        // ->make() 
                        ->download('BlackListed_Users'); // other available method: store('path/to/file.pdf') to save to disk, download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
        }

        public function generateCSV(){

            $title = 'Blacklisted Users'; // Report title
    
            $meta = [ // For displaying filters description on header
                'Date' => \Carbon\Carbon::today()->format('d M Y'),
            
            ];
    
            $queryBuilder = \DB::table('blacklist')->select(['name','phone']);
    
            $columns = [ // Set Column to be displayed
                'Name' => 'name',
                'Mobile Number' => 'phone' ,// if no column_name specified, this will automatically seach for snake_case of column name (will be registered_at) column from query result
            ];
    
            // Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
            return CSVReport::of($title, $meta, $queryBuilder, $columns)
                            ->editColumn('Name', [ // Change column class or manipulate its data for displaying to report
                                'class' => 'left'
                            ])
                            //->limit(20)// Limit record to be showed
                            // ->make() 
                            ->download('BlackListed_Users'); // other available method: store('path/to/file.pdf') to save to disk, download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
            }
            public function generateExcel(){

                $title = 'Blacklisted Users'; // Report title
        
                $meta = [ // For displaying filters description on header
                    'Date' => \Carbon\Carbon::today()->format('d M Y'),
                
                ];
        
                $queryBuilder = \DB::table('blacklist')->select(['name','phone']);
        
                $columns = [ // Set Column to be displayed
                    'Name' => 'name',
                    'Mobile Number' => 'phone' ,// if no column_name specified, this will automatically seach for snake_case of column name (will be registered_at) column from query result
                ];
        
                // Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
                return ExcelReport::of($title, $meta, $queryBuilder, $columns)
                                ->editColumn('Name', [ // Change column class or manipulate its data for displaying to report
                                    'class' => 'left'
                                ])
                                //->limit(20)// Limit record to be showed
                                // ->make() 
                                ->download('BlackListed_Users'); // other available method: store('path/to/file.pdf') to save to disk, download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
                }
}
