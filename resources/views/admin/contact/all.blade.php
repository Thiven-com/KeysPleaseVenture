@extends('layout.mainlayout')

@section('content')

    <style>
        /*=========================================
                    CONTACT ENQUIRIES ADMIN PAGE
                ========================================= */

        .page-wrapper {
            width: 100%;
            max-width: 100%;
            overflow-x: hidden;
        }

        .page-wrapper .content {
            width: 80%;
            max-width: 100%;
            padding: 28px 30px;
            box-sizing: border-box;
        }


        /* =========================================
                     PAGE HEADER
                    ========================================= */

        .page-header-modern {
            margin-bottom: 22px;
        }

        .page-header-modern h3 {
            margin: 0;
            color: #071b3d;
            font-size: 25px;
            font-weight: 700;
            line-height: 1.3;
            letter-spacing: -0.4px;
        }

        .page-header-modern p {
            margin: 5px 0 0;
            color: #687389;
            font-size: 13px;
            line-height: 1.5;
        }


        /* =========================================
               MAIN CARD
            ========================================= */

        .modern-card {
            width: 100%;
            max-width: 100%;
            background: #ffffff;
            border: 1px solid #e6ebf2;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(7, 27, 61, 0.06);
            box-sizing: border-box;
        }


        /* =========================================
               TABLE RESPONSIVE
            ========================================= */

        .table-responsive {
            width: 100%;
            max-width: 100%;
            overflow-x: auto;
            overflow-y: hidden;
            -webkit-overflow-scrolling: touch;
        }


        /* Scrollbar */

        .table-responsive::-webkit-scrollbar {
            height: 10px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: #f1f4f8;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: #c6cfdb;
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: #9eabbc;
        }


        /* =========================================
               TABLE
            ========================================= */

        .modern-card .table {
            width: 100%;
            /* max-width: 100%; */
            margin: 0;
            table-layout: fixed;
            border-collapse: collapse;
        }


        /* =========================================
               TABLE HEADER
            ========================================= */

        .modern-card .table thead {
            background: #f3f6fa;
        }

        .modern-card .table thead th {
            padding: 15px 10px;
            color: #071b3d;
            font-size: 11px;
            font-weight: 700;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: .35px;
            white-space: nowrap;
            border: 0;
            border-bottom: 1px solid #e1e7ef;
            vertical-align: middle;
        }


        /* =========================================
               TABLE BODY
            ========================================= */

        .modern-card .table tbody tr {
            background: #ffffff;
            transition: background .2s ease;
        }

        .modern-card .table tbody tr:hover {
            background: #f9fbfd;
        }

        .modern-card .table tbody td {
            padding: 14px 10px;
            color: #4d596c;
            font-size: 12px;
            line-height: 1.45;
            border: 0;
            border-bottom: 1px solid #edf0f4;
            vertical-align: middle;

            word-break: break-word;
            overflow-wrap: anywhere;
        }

        .modern-card .table tbody tr:last-child td {
            border-bottom: 0;
        }


        /* =========================================
               COLUMN WIDTHS
            ========================================= */

        /* S.No */

        .modern-card .table th:nth-child(1),
        .modern-card .table td:nth-child(1) {
            width: 5%;
            text-align: center;
            color: #7d899b;
            font-weight: 600;
        }


        /* Name */

        .modern-card .table th:nth-child(2),
        .modern-card .table td:nth-child(2) {
            width: 10%;
        }


        /* Phone */

        .modern-card .table th:nth-child(3),
        .modern-card .table td:nth-child(3) {
            width: 11%;
        }


        /* Email */

        .modern-card .table th:nth-child(4),
        .modern-card .table td:nth-child(4) {
            width: 18%;
        }


        /* Company */

        .modern-card .table th:nth-child(5),
        .modern-card .table td:nth-child(5) {
            width: 10%;
        }


        /* Service */

        .modern-card .table th:nth-child(6),
        .modern-card .table td:nth-child(6) {
            width: 13%;
        }


        /* Manpower */

        .modern-card .table th:nth-child(7),
        .modern-card .table td:nth-child(7) {
            width: 8%;
            text-align: center;
        }


        /* Message */

        .modern-card .table th:nth-child(8),
        .modern-card .table td:nth-child(8) {
            width: 17%;
        }


        /* Action */

        .modern-card .table th:nth-child(9),
        .modern-card .table td:nth-child(9) {
            width: 8%;
            text-align: center;
        }


        /* =========================================
               NAME
            ========================================= */

        .modern-card .table tbody td:nth-child(2) {
            color: #071b3d;
            font-weight: 700;
        }


        /* =========================================
               PHONE
            ========================================= */

        .modern-card .table tbody td:nth-child(3) {
            color: #26364e;
            font-weight: 600;
            white-space: nowrap;
        }


        /* =========================================
               EMAIL
            ========================================= */

        .modern-card .table tbody td:nth-child(4) {
            color: #536176;
        }


        /* =========================================
               COMPANY
            ========================================= */

        .modern-card .table tbody td:nth-child(5) {
            color: #344158;
            font-weight: 600;
        }


        /* =========================================
               SERVICE BADGE
            ========================================= */

        .service-badge {
            display: inline-block;
            max-width: 100%;

            padding: 6px 9px;

            border-radius: 6px;

            background: #fff1f2;
            color: #e52229;

            font-size: 10px;
            font-weight: 700;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;

            vertical-align: middle;
        }


        /* =========================================
               MANPOWER BADGE
            ========================================= */

        .manpower-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-width: 32px;
            height: 28px;

            padding: 0 8px;

            border-radius: 7px;

            background: #eef3ff;
            color: #071b3d;

            font-size: 11px;
            font-weight: 700;
        }


        /* =========================================
               MESSAGE
            ========================================= */

        /* .message-box {
            width: 100%;
            max-width: 100%;

            box-sizing: border-box;

            padding: 7px 9px;

            background: #f6f8fb;
            border: 1px solid #e8edf3;

            border-radius: 7px;

            color: #667286;

            font-size: 11px;
            line-height: 1.45;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        } */


        /* =========================================
               ACTION BUTTON
            ========================================= */

        .modern-card .table tbody td:last-child {
            text-align: center;
            white-space: nowrap;
        }

        .action-btn {
            width: 34px;
            height: 34px;

            padding: 0;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            border: 0;
            border-radius: 8px;

            cursor: pointer;

            transition: all .25s ease;
        }


        /* Delete */

        .btn-delete {
            background: #fff1f2;
            color: #e52229;
        }

        .btn-delete:hover {
            background: #e52229;
            color: #ffffff;

            transform: translateY(-2px);

            box-shadow: 0 5px 12px rgba(229, 34, 41, .22);
        }

        .btn-delete i {
            font-size: 16px;
        }


        /* =========================================
               EMPTY STATE
            ========================================= */

        .modern-card .table tbody td.text-center {
            padding: 60px 20px !important;
            color: #687389;
        }

        .modern-card .table tbody td.text-center h5 {
            margin: 0;
            color: #687389;
            font-size: 14px;
            font-weight: 600;
        }


        /* =========================================
           TABLET
        ========================================= */

        @media (max-width: 1100px) {

            .page-wrapper .content {
                width: 100%;
                padding: 24px 20px;
            }

            .modern-card .table {
                min-width: 1000px;
                table-layout: fixed;
            }

            .modern-card .table thead th {
                padding: 12px 8px;
                font-size: 10px;
            }

            .modern-card .table tbody td {
                padding: 12px 8px;
                font-size: 11px;
            }
        }


        /* =========================================
           MOBILE
        ========================================= */

        @media (max-width: 768px) {

            .page-wrapper {
                width: 100%;
                max-width: 100%;
                overflow-x: hidden;
            }

            .page-wrapper .content {
                width: 100%;
                max-width: 100%;
                padding: 16px 10px;
                box-sizing: border-box;
            }

            .page-header-modern {
                width: 100%;
                margin-bottom: 15px;
            }

            .page-header-modern h3 {
                font-size: 20px;
                line-height: 1.3;
            }

            .page-header-modern p {
                font-size: 11px;
                margin-top: 4px;
            }

            .modern-card {
                width: 100%;
                max-width: 100%;
                border-radius: 10px;
                overflow: hidden;
            }

            /*
               IMPORTANT:
               Keep the table wider than the phone.
               The user can swipe horizontally.
            */

            .table-responsive {
                width: 100%;
                max-width: 100%;
                overflow-x: auto;
                overflow-y: hidden;
                display: block;
            }

            .modern-card .table {
                width: 1050px;
                min-width: 1050px;
                max-width: none;
                table-layout: fixed;
            }

            /* Header */

            .modern-card .table thead th {
                padding: 11px 8px;
                font-size: 9px;
                line-height: 1.2;
                white-space: nowrap;
            }

            /* Body */

            .modern-card .table tbody td {
                padding: 12px 8px;
                font-size: 10px;
                line-height: 1.4;

                white-space: normal;
                word-break: break-word;
                overflow-wrap: break-word;
            }

            /* S.No */

            .modern-card .table th:nth-child(1),
            .modern-card .table td:nth-child(1) {
                width: 50px;
                min-width: 50px;
            }

            /* Name */

            .modern-card .table th:nth-child(2),
            .modern-card .table td:nth-child(2) {
                width: 120px;
                min-width: 120px;
            }

            /* Phone */

            .modern-card .table th:nth-child(3),
            .modern-card .table td:nth-child(3) {
                width: 120px;
                min-width: 120px;
                white-space: nowrap;
            }

            /* Email */

            .modern-card .table th:nth-child(4),
            .modern-card .table td:nth-child(4) {
                width: 190px;
                min-width: 190px;
            }

            /* Company */

            .modern-card .table th:nth-child(5),
            .modern-card .table td:nth-child(5) {
                width: 130px;
                min-width: 130px;
            }

            /* Service */

            .modern-card .table th:nth-child(6),
            .modern-card .table td:nth-child(6) {
                width: 135px;
                min-width: 135px;
            }

            /* Manpower */

            .modern-card .table th:nth-child(7),
            .modern-card .table td:nth-child(7) {
                width: 90px;
                min-width: 90px;
            }

            /* Message */

            .modern-card .table th:nth-child(8),
            .modern-card .table td:nth-child(8) {
                width: 180px;
                min-width: 180px;
            }

            /* Action */

            .modern-card .table th:nth-child(9),
            .modern-card .table td:nth-child(9) {
                width: 70px;
                min-width: 70px;
            }

            /* Message box */

            .message-box {
                width: 100%;
                max-width: 100%;
                padding: 7px 8px;

                font-size: 9px;
                line-height: 1.4;

                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;

                box-sizing: border-box;
            }

            /* Service */

            .service-badge {
                display: inline-block;
                max-width: 120px;

                padding: 5px 7px;

                font-size: 8px;

                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            /* Manpower */

            .manpower-badge {
                min-width: 30px;
                height: 25px;

                padding: 0 6px;

                font-size: 9px;
            }

            /* Delete */

            .action-btn {
                width: 29px;
                height: 29px;
                border-radius: 6px;
            }

            .btn-delete i {
                font-size: 13px;
            }

            /* Scrollbar */

            .table-responsive::-webkit-scrollbar {
                height: 6px;
            }

            .table-responsive::-webkit-scrollbar-track {
                background: #eef1f5;
            }

            .table-responsive::-webkit-scrollbar-thumb {
                background: #c3ccd9;
                border-radius: 10px;
            }
        }


        /* =========================================
           SMALL MOBILE
        ========================================= */

        @media (max-width: 480px) {

            .page-wrapper .content {
                width: 100%;
                padding: 14px 8px;
            }

            .page-header-modern h3 {
                font-size: 18px;
            }

            .page-header-modern p {
                font-size: 10px;
            }

            .modern-card {
                border-radius: 9px;
            }

            /*
               Still keep table readable.
               Do NOT set min-width: 0 here.
            */

            .modern-card .table {
                width: 1050px;
                min-width: 1050px;
            }

            .modern-card .table thead th {
                padding: 10px 7px;
                font-size: 8px;
            }

            .modern-card .table tbody td {
                padding: 10px 7px;
                font-size: 9px;
            }

            .message-box {
                padding: 6px 7px;
                font-size: 8px;
            }

            .service-badge {
                padding: 4px 6px;
                font-size: 8px;
            }

            .manpower-badge {
                min-width: 27px;
                height: 23px;
                font-size: 8px;
            }

            .action-btn {
                width: 27px;
                height: 27px;
            }

            .btn-delete i {
                font-size: 12px;
            }
        }
    </style>


    <div class="page-wrapper">

        <div class="content">

            <div class="page-header-modern">
                <h3>Contact Enquiries</h3>
                <p class="mb-0">
                    Manage website Arunachala Solar enquiries
                </p>
            </div>

            <div class="modern-card">

                <div class="table-responsive">

                    <table class="table align-middle mb-0">

                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Company</th>
                                <th>Service</th>
                                <th>Capacity</th>
                                <th>Location</th>
                                <th>Message</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($contacts as $contact)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $contact->name }}
                                    </td>

                                    <td>
                                        {{ $contact->phone }}
                                    </td>

                                    <td>
                                        {{ $contact->email ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $contact->company ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $contact->service ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $contact->capacity ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $contact->location ?? '-' }}
                                    </td>

                                    <td>
                                        <div class="message-box">
                                            {{ \Illuminate\Support\Str::limit($contact->message, 100) }}
                                        </div>
                                    </td>
                                    <td>

                                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                            style="display:inline;">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="action-btn btn-delete"
                                                onclick="return confirm('Are you sure you want to delete this enquiry?')">
                                                <i class="ti ti-trash"></i>
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="9" class="text-center py-5">
                                        <h5>No Contact Enquiries Found</h5>
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>
@endsection