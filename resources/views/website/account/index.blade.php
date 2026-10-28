@extends('layouts.website')

@section('content')

    <style>
        .kp-account {
            --kp-primary: #00068a;
            --kp-blue: #343de0;
            --kp-text: #111b49;
            --kp-muted: #697590;
            --kp-border: #e1e7f2;
            background: #f5f8fe;
            min-height: 80vh;
            padding-bottom: 55px;
            color: var(--kp-text);
            font-family: inherit;
        }

        .kp-account * {
            box-sizing: border-box;
        }

        .kp-account-hero {
            padding: 28px 0 24px;
            background:
                radial-gradient(ellipse at 90% 0%, #dce8ff 0%, transparent 48%),
                linear-gradient(115deg, #fff 0%, #f0f5ff 100%);
            border-bottom: 1px solid #e6edfb;
        }

        .kp-breadcrumb {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 12px;
            color: var(--kp-muted);
            margin-bottom: 12px;
        }

        .kp-breadcrumb a {
            color: var(--kp-primary);
            text-decoration: none;
        }

        .kp-account-hero h1 {
            font-size: clamp(26px, 3vw, 34px);
            font-weight: 800;
            letter-spacing: -.8px;
            margin: 0 0 8px;
            color: var(--kp-text);
        }

        .kp-account-hero p {
            margin: 0;
            font-size: 14px;
            color: #53658f;
        }

        .kp-account-layout {
            display: grid;
            grid-template-columns: 270px minmax(0, 1fr);
            gap: 24px;
            align-items: start;
            padding-top: 26px;
        }

        .kp-sidebar,
        .kp-panel {
            background: #fff;
            border: 1px solid var(--kp-border);
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(29, 53, 112, .035);
        }

        .kp-sidebar {
            overflow: hidden;
            position: sticky;
            top: 20px;
        }

        .kp-user {
            padding: 27px 22px 23px;
        }

        .kp-avatar {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(145deg, #00068a, #4349e7);
            color: #fff;
            font-size: 29px;
            font-weight: 700;
            margin-bottom: 16px;
            box-shadow: 0 7px 18px rgba(0, 6, 138, .2);
        }

        .kp-user h3 {
            font-size: 18px;
            font-weight: 750;
            margin: 0 0 7px;
            overflow-wrap: anywhere;
        }

        .kp-user-email {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            color: var(--kp-muted);
            font-size: 12px;
            overflow-wrap: anywhere;
        }

        .kp-user-email svg {
            flex-shrink: 0;
            margin-top: 2px;
        }

        .kp-sidebar-nav {
            padding: 0 12px 14px;
        }

        .kp-nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 13px 14px;
            border-radius: 9px;
            color: #475371;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 4px;
            transition: background .2s, color .2s;
        }

        .kp-nav-link svg {
            width: 19px;
            height: 19px;
            flex-shrink: 0;
        }

        .kp-nav-link:hover,
        .kp-nav-link.active {
            background: #eeefff;
            color: var(--kp-primary);
        }

        .kp-nav-link.active {
            box-shadow: inset 3px 0 #00068a;
        }

        .kp-sidebar-divider {
            height: 1px;
            background: var(--kp-border);
            margin: 12px 10px;
        }

        .kp-logout-form {
            margin: 0;
        }

        .kp-logout {
            border: 0;
            background: transparent;
            color: #d92d45;
            cursor: pointer;
        }

        .kp-logout:hover {
            background: #fff0f1;
        }

        .kp-main {
            min-width: 0;
        }

        .kp-panel {
            padding: 23px;
            margin-bottom: 18px;
            scroll-margin-top: 25px;
        }

        .kp-panel-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .kp-panel-title {
            display: flex;
            align-items: center;
            gap: 13px;
            min-width: 0;
        }

        .kp-icon-box {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: #343de0;
            background: linear-gradient(140deg, #f0efff, #e7eaff);
        }

        .kp-icon-box svg {
            width: 22px;
            height: 22px;
        }

        .kp-panel-title h2 {
            font-size: 17px;
            font-weight: 750;
            margin: 0 0 5px;
            color: var(--kp-text);
        }

        .kp-panel-title p {
            font-size: 12px;
            color: var(--kp-muted);
            margin: 0;
            line-height: 1.5;
        }

        .kp-outline-btn,
        .kp-primary-btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
            transition: .2s ease;
        }

        .kp-outline-btn {
            border: 1px solid #3039d5;
            background: #fff;
            color: var(--kp-primary);
        }

        .kp-outline-btn:hover {
            background: #f0f1ff;
            color: var(--kp-primary);
        }

        .kp-primary-btn {
            border: 1px solid var(--kp-primary);
            background: var(--kp-primary);
            color: #fff;
        }

        .kp-primary-btn:hover {
            background: #00045f;
            color: #fff;
            transform: translateY(-1px);
        }

        .kp-profile-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            background: #f6f8fd;
            border-radius: 12px;
            padding: 17px 10px;
        }

        .kp-profile-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 12px;
            min-width: 0;
        }

        .kp-profile-item+.kp-profile-item {
            border-left: 1px solid #dce3f0;
        }

        .kp-mini-icon {
            width: 43px;
            height: 43px;
            flex-shrink: 0;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e9edff;
            color: #303bd3;
        }

        .kp-mini-icon svg {
            width: 20px;
            height: 20px;
        }

        .kp-field-label {
            font-size: 11px;
            color: var(--kp-muted);
            margin-bottom: 6px;
        }

        .kp-field-value {
            font-size: 13px;
            font-weight: 700;
            overflow-wrap: anywhere;
            line-height: 1.5;
        }

        .kp-empty {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 24px;
            padding: 24px;
            border-radius: 12px;
            background: linear-gradient(115deg, #f5f8ff, #f0f3ff);
        }

        .kp-empty-art {
            width: 88px;
            height: 88px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #545ff0;
            background: linear-gradient(145deg, #e4eaff, #fff);
            border: 1px solid #e2e8ff;
            border-radius: 22px;
        }

        .kp-empty-art svg {
            width: 43px;
            height: 43px;
        }

        .kp-empty-content h3 {
            font-size: 14px;
            font-weight: 750;
            margin: 0 0 6px;
        }

        .kp-empty-content p {
            font-size: 12px;
            color: var(--kp-muted);
            line-height: 1.6;
            margin: 0 0 12px;
        }

        .kp-subscription-status {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px;
            border-radius: 11px;
            background: linear-gradient(100deg, #eff1ff, #f6f7ff);
        }

        .kp-subscription-status .kp-icon-box {
            background: #dfe4ff;
        }

        .kp-subscription-copy {
            flex: 1;
            min-width: 0;
        }

        .kp-subscription-copy h3 {
            font-size: 13px;
            font-weight: 750;
            margin: 0 0 5px;
        }

        .kp-subscription-copy p {
            font-size: 12px;
            line-height: 1.5;
            color: var(--kp-muted);
            margin: 0;
        }

        @media (max-width: 1050px) {
            .kp-account-layout {
                grid-template-columns: 235px minmax(0, 1fr);
                gap: 17px;
            }

            .kp-profile-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .kp-profile-item+.kp-profile-item {
                border-left: 0;
                border-top: 1px solid #dce3f0;
                padding-top: 15px;
            }

            .kp-profile-item {
                padding-left: 8px;
            }
        }

        @media (max-width: 767px) {
            .kp-account-hero {
                padding: 23px 0;
            }

            .kp-account-layout {
                grid-template-columns: 1fr;
                padding-top: 18px;
            }

            .kp-sidebar {
                position: static;
            }

            .kp-user {
                display: flex;
                align-items: center;
                gap: 15px;
                padding: 19px;
            }

            .kp-avatar {
                width: 56px;
                height: 56px;
                font-size: 23px;
                margin: 0;
            }

            .kp-sidebar-nav {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 5px;
            }

            .kp-nav-link {
                margin: 0;
                padding: 12px 9px;
                font-size: 12px;
            }

            .kp-sidebar-divider {
                grid-column: 1 / -1;
            }

            .kp-logout-form {
                grid-column: 1 / -1;
            }

            .kp-panel {
                padding: 18px;
                margin-bottom: 14px;
            }
        }

        @media (max-width: 480px) {
            .kp-panel-head {
                align-items: flex-start;
                flex-wrap: wrap;
            }

            .kp-panel-title {
                gap: 10px;
            }

            .kp-panel-title h2 {
                font-size: 15px;
            }

            .kp-panel-title p {
                font-size: 11px;
            }

            .kp-panel-head>.kp-outline-btn,
            .kp-panel-head>.kp-primary-btn {
                margin-left: 55px;
            }

            .kp-empty {
                flex-direction: column;
                text-align: center;
                gap: 15px;
                padding: 22px 15px;
            }

            .kp-empty-art {
                width: 70px;
                height: 70px;
            }

            .kp-subscription-status {
                align-items: flex-start;
                flex-wrap: wrap;
            }

            .kp-subscription-status>.kp-outline-btn {
                margin-left: 55px;
            }

            .kp-profile-item {
                padding-left: 0;
            }
        }



        .kp-enquiry-list {
            padding: 0 24px;
        }

        .kp-enquiry-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            padding: 20px 0;
            border-bottom: 1px solid #e8eaf1;
        }

        .kp-enquiry-item:last-child {
            border-bottom: none;
        }

        .kp-enquiry-info h3 {
            margin: 0 0 8px;
            font-size: 15px;
            font-weight: 700;
            color: #20243a;
        }

        .kp-enquiry-info p {
            margin: 4px 0;
            color: #72798b;
            font-size: 12px;
        }

        .kp-enquiry-info p span {
            margin: 0 5px;
        }

        .kp-enquiry-status {
            flex-shrink: 0;
        }

        .kp-enquiry-status .kp-status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            background: #fff4df;
            color: #986000;
            font-size: 11px;
            font-weight: 700;
        }

        .kp-enquiry-status .status-contacted,
        .kp-enquiry-status .status-in-progress {
            background: #eaf2ff;
            color: #2058a5;
        }

        .kp-enquiry-status .status-completed,
        .kp-enquiry-status .status-approved {
            background: #e8f8ee;
            color: #167444;
        }

        .kp-enquiry-status .status-rejected,
        .kp-enquiry-status .status-cancelled {
            background: #fff0f0;
            color: #b42318;
        }

        @media (max-width: 576px) {
            .kp-enquiry-list {
                padding: 0 16px;
            }

            .kp-enquiry-item {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        
.kp-recent-visits {
    padding: 0 24px;
}

.kp-recent-visit-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
    padding: 20px 0;
    border-bottom: 1px solid #e8eaf1;
}

.kp-recent-visit-item:last-child {
    border-bottom: none;
}

.kp-recent-visit-info h3 {
    margin: 0 0 8px;
    color: #20243a;
    font-size: 15px;
    font-weight: 700;
}

.kp-recent-visit-info p {
    margin: 5px 0;
    color: #72798b;
    font-size: 12px;
}

.kp-recent-visit-info p span {
    margin: 0 5px;
}

.kp-recent-visit-status .kp-visit-status {
    display: inline-block;
    padding: 6px 11px;
    border-radius: 20px;
    background: #fff4df;
    color: #986000;
    font-size: 11px;
    font-weight: 700;
    white-space: nowrap;
}

.kp-recent-visit-status .status-confirmed,
.kp-recent-visit-status .status-approved,
.kp-recent-visit-status .status-completed {
    background: #e8f8ee;
    color: #167444;
}

.kp-recent-visit-status .status-cancelled,
.kp-recent-visit-status .status-rejected {
    background: #fff0f0;
    color: #b42318;
}

@media (max-width: 576px) {
    .kp-recent-visits {
        padding: 0 16px;
    }

    .kp-recent-visit-item {
        align-items: flex-start;
        flex-direction: column;
    }
}

    </style>



<style>
    
/* =========================================
   RESPONSIVE ACCOUNT PAGE
   Desktop, Tablet & Mobile
========================================= */

/* Prevent horizontal overflow */
.kp-account {
    width: 100%;
    max-width: 100%;
    overflow-x: clip;
}

.kp-account .container {
    width: 100%;
}

/* Desktop layout */
.kp-account-layout {
    display: grid;
    grid-template-columns: 260px minmax(0, 1fr);
    gap: 24px;
    align-items: start;
}

.kp-sidebar {
    width: 100%;
    min-width: 0;
}

.kp-main {
    width: 100%;
    min-width: 0;
}

.kp-panel {
    min-width: 0;
}

.kp-profile-grid {
    grid-template-columns: repeat(3, minmax(0, 1fr));
}

.kp-profile-item {
    min-width: 0;
}

.kp-enquiry-list,
.kp-recent-visits {
    min-width: 0;
}

/* =========================================
   TABLET VIEW: 768px–1024px
========================================= */
@media (min-width: 768px) and (max-width: 1024px) {
    .kp-account-hero {
        padding: 24px 0 20px;
    }

    .kp-account-layout {
        grid-template-columns: 210px minmax(0, 1fr);
        gap: 16px;
        padding-top: 20px;
    }

    .kp-sidebar {
        position: sticky;
        top: 15px;
    }

    .kp-user {
        padding: 20px 16px;
    }

    .kp-avatar {
        width: 58px;
        height: 58px;
        font-size: 23px;
    }

    .kp-user h3 {
        font-size: 16px;
    }

    .kp-sidebar-nav {
        padding: 0 8px 12px;
    }

    .kp-nav-link {
        gap: 9px;
        padding: 12px 9px;
        font-size: 12px;
    }

    .kp-panel {
        padding: 18px;
    }

    .kp-panel-head {
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .kp-panel-title {
        gap: 10px;
    }

    .kp-icon-box {
        width: 40px;
        height: 40px;
    }

    .kp-panel-title h2 {
        font-size: 15px;
    }

    .kp-profile-grid {
        grid-template-columns: 1fr;
        gap: 0;
        padding: 10px;
    }

    .kp-profile-item {
        padding: 12px 8px;
    }

    .kp-profile-item + .kp-profile-item {
        border-left: 0;
        border-top: 1px solid #dce3f0;
    }

    .kp-enquiry-list,
    .kp-recent-visits {
        padding: 0 16px;
    }

    .kp-enquiry-item,
    .kp-recent-visit-item {
        gap: 12px;
    }
}

/* =========================================
   MOBILE VIEW: 767px AND BELOW
========================================= */
@media (max-width: 767px) {
    .kp-account {
        padding-bottom: 30px;
    }

    .kp-account-hero {
        padding: 20px 0;
    }

    .kp-breadcrumb {
        flex-wrap: wrap;
        font-size: 11px;
    }

    .kp-account-hero h1 {
        font-size: 25px;
        line-height: 1.3;
        letter-spacing: -0.4px;
    }

    .kp-account-hero p {
        font-size: 13px;
        line-height: 1.6;
    }

    /* Stack sidebar and main content */
    .kp-account-layout {
        display: flex;
        flex-direction: column;
        gap: 16px;
        padding-top: 16px;
    }

    .kp-sidebar,
    .kp-main {
        width: 100%;
        min-width: 0;
    }

    .kp-sidebar {
        position: static;
        border-radius: 12px;
    }

    /* User information */
    .kp-user {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 16px;
    }

    .kp-avatar {
        width: 52px;
        height: 52px;
        min-width: 52px;
        font-size: 21px;
        margin: 0;
    }

    .kp-user h3 {
        font-size: 15px;
        margin-bottom: 5px;
    }

    .kp-user-email {
        font-size: 11px;
        overflow-wrap: anywhere;
    }

    /* Two-column navigation */
    .kp-sidebar-nav {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 5px;
        padding: 0 10px 12px;
    }

    .kp-nav-link {
        display: flex;
        align-items: center;
        gap: 8px;
        min-width: 0;
        min-height: 43px;
        margin: 0;
        padding: 10px;
        font-size: 11px;
        line-height: 1.4;
        overflow-wrap: anywhere;
    }

    .kp-nav-link svg {
        width: 17px;
        height: 17px;
    }

    .kp-sidebar-divider {
        grid-column: 1 / -1;
        margin: 8px 0;
    }

    .kp-logout-form {
        grid-column: 1 / -1;
        width: 100%;
    }

    .kp-logout {
        text-align: left;
    }

    /* Panels */
    .kp-panel {
        padding: 16px;
        margin-bottom: 14px;
        border-radius: 12px;
    }

    .kp-panel-head {
        display: flex;
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 16px;
    }

    .kp-panel-title {
        flex: 1 1 100%;
        gap: 10px;
    }

    .kp-icon-box {
        width: 39px;
        height: 39px;
        min-width: 39px;
        border-radius: 10px;
    }

    .kp-icon-box svg {
        width: 20px;
        height: 20px;
    }

    .kp-panel-title h2 {
        font-size: 15px;
        line-height: 1.4;
    }

    .kp-panel-title p {
        font-size: 11px;
    }

    .kp-panel-head > .kp-outline-btn,
    .kp-panel-head > .kp-primary-btn {
        margin-left: 0;
        width: 100%;
        white-space: normal;
    }

    .kp-outline-btn,
    .kp-primary-btn {
        min-height: 40px;
        padding: 10px 12px;
        font-size: 12px;
    }

    /* Profile information */
    .kp-profile-grid {
        grid-template-columns: minmax(0, 1fr);
        gap: 0;
        padding: 8px 12px;
    }

    .kp-profile-item {
        padding: 13px 0;
        gap: 11px;
    }

    .kp-profile-item + .kp-profile-item {
        border-left: 0;
        border-top: 1px solid #dce3f0;
    }

    .kp-mini-icon {
        width: 38px;
        height: 38px;
        min-width: 38px;
    }

    .kp-mini-icon svg {
        width: 18px;
        height: 18px;
    }

    .kp-field-label {
        font-size: 11px;
    }

    .kp-field-value {
        font-size: 12px;
    }

    /* Empty states */
    .kp-empty {
        flex-direction: column;
        gap: 14px;
        padding: 20px 14px;
        text-align: center;
    }

    .kp-empty-art {
        width: 65px;
        height: 65px;
        border-radius: 16px;
    }

    .kp-empty-art svg {
        width: 32px;
        height: 32px;
    }

    .kp-empty-content h3 {
        font-size: 14px;
    }

    .kp-empty-content p {
        font-size: 12px;
    }

    /* Subscription */
    .kp-subscription-status {
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 12px;
        padding: 12px;
    }

    .kp-subscription-copy {
        flex: 1 1 calc(100% - 55px);
    }

    .kp-subscription-status > .kp-outline-btn {
        margin-left: 0;
        width: 100%;
    }

    /* Enquiry and visit lists */
    .kp-enquiry-list,
    .kp-recent-visits {
        padding: 0 12px;
    }

    .kp-enquiry-item,
    .kp-recent-visit-item {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
        padding: 16px 0;
    }

    .kp-enquiry-info,
    .kp-recent-visit-info {
        width: 100%;
        min-width: 0;
    }

    .kp-enquiry-info h3,
    .kp-recent-visit-info h3 {
        font-size: 14px;
        line-height: 1.5;
        overflow-wrap: anywhere;
    }

    .kp-enquiry-info p,
    .kp-recent-visit-info p {
        font-size: 11px;
        line-height: 1.6;
        overflow-wrap: anywhere;
    }

    .kp-enquiry-status,
    .kp-recent-visit-status {
        align-self: flex-start;
    }
}

/* =========================================
   SMALL MOBILE: 360px AND BELOW
========================================= */
@media (max-width: 360px) {
    .kp-account-hero h1 {
        font-size: 22px;
    }

    .kp-panel {
        padding: 12px;
    }

    .kp-user {
        padding: 13px;
        gap: 10px;
    }

    .kp-avatar {
        width: 45px;
        height: 45px;
        min-width: 45px;
        font-size: 19px;
    }

    .kp-nav-link {
        gap: 6px;
        padding: 9px 7px;
        font-size: 10px;
    }

    .kp-enquiry-list,
    .kp-recent-visits {
        padding: 0 8px;
    }
}

</style>
    @php
        $customer = auth('customer')->user();

        $customerName = $customer->name ?? 'Customer';
        $customerEmail = $customer->email ?? 'Email not added';
        $customerMobile = $customer->mobile
            ?? $customer->phone
            ?? 'Not provided';

        $initial = strtoupper(substr($customerName, 0, 1));
    @endphp

    <div class="kp-account">

        {{-- Page Heading --}}
        <section class="kp-account-hero">
            <div class="container">
                <div class="kp-breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span>›</span>
                    <span>My Account</span>
                </div>

                <h1>My Account</h1>
                <p>
                    Manage your Keys Please Venture account and stay updated
                    with your property journey.
                </p>
            </div>
        </section>

        <div class="container">
            <div class="kp-account-layout">

                {{-- Sidebar --}}
                <aside class="kp-sidebar">

                    <div class="kp-user">
                        <div class="kp-avatar">{{ $initial }}</div>

                        <div>
                            <h3>{{ $customerName }}</h3>

                            <div class="kp-user-email">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">
                                    <rect x="3" y="5" width="18" height="14" rx="2" />
                                    <path d="m3 7 9 6 9-6" />
                                </svg>

                                <span>{{ $customerEmail }}</span>
                            </div>
                        </div>
                    </div>

                    <nav class="kp-sidebar-nav">

                        <a href="#profile" class="kp-nav-link active">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="8" r="4" />
                                <path d="M4 21v-2a8 8 0 0 1 16 0v2" />
                            </svg>
                            My Profile
                        </a>

                        <a href="{{ route('customer.enquiries') }}" class="kp-nav-link">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <rect x="5" y="3" width="14" height="18" rx="2" />
                                <path d="M9 8h6M9 12h6M9 16h4" />
                            </svg>
                            My Enquiries
                        </a>


                        <a href="{{ route('customer.site-visits') }}" class="kp-nav-link">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <rect x="3" y="5" width="18" height="16" rx="2" />
                                <path d="M16 3v4M8 3v4M3 10h18M8 14h3M8 17h6" />
                            </svg>
                            My Site Visits
                        </a>


                        <a href="{{ route('subscription.index') }}" class="kp-nav-link">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <rect x="3" y="5" width="18" height="14" rx="2" />
                                <path d="M3 10h18" />
                            </svg>
                            My Subscription
                        </a>

                        <div class="kp-sidebar-divider"></div>

                        <form class="kp-logout-form" method="POST" action="{{ route('customer.logout') }}">
                            @csrf

                            <button type="submit" class="kp-nav-link kp-logout">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M10 17l5-5-5-5M15 12H3" />
                                    <path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7" />
                                </svg>
                                Logout
                            </button>
                        </form>

                    </nav>
                </aside>



                {{-- Main Dashboard --}}
                <main class="kp-main">
                    @if (session('success'))
                        <div class="alert alert-success mb-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Profile --}}
                    <section class="kp-panel" id="profile">

                        <div class="kp-panel-head">
                            <div class="kp-panel-title">
                                <div class="kp-icon-box">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <circle cx="12" cy="8" r="4" />
                                        <path d="M4 21v-2a8 8 0 0 1 16 0v2" />
                                    </svg>
                                </div>

                                <div>
                                    <h2>My Profile</h2>
                                    <p>View your personal information.</p>
                                </div>
                            </div>
                            <a href="{{ route('customer.profile.edit') }}" class="kp-outline-btn">
                                <i class="fas fa-pen"></i>
                                Edit Profile
                            </a>
                        </div>


                        <div class="kp-profile-grid">

                            <div class="kp-profile-item">
                                <div class="kp-mini-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <circle cx="12" cy="8" r="4" />
                                        <path d="M4 21v-2a8 8 0 0 1 16 0v2" />
                                    </svg>
                                </div>

                                <div>
                                    <div class="kp-field-label">Full Name</div>
                                    <div class="kp-field-value">
                                        {{ $customerName }}
                                    </div>
                                </div>
                            </div>

                            <div class="kp-profile-item">
                                <div class="kp-mini-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <rect x="3" y="5" width="18" height="14" rx="2" />
                                        <path d="m3 7 9 6 9-6" />
                                    </svg>
                                </div>

                                <div>
                                    <div class="kp-field-label">Email Address</div>
                                    <div class="kp-field-value">
                                        {{ $customerEmail }}
                                    </div>
                                </div>
                            </div>

                            <div class="kp-profile-item">
                                <div class="kp-mini-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M22 16.9v3a2 2 0 0 1-2.2 2
                                                                19.8 19.8 0 0 1-8.6-3.1
                                                                19.4 19.4 0 0 1-6-6
                                                                19.8 19.8 0 0 1-3.1-8.7
                                                                A2 2 0 0 1 4.1 2h3
                                                                a2 2 0 0 1 2 1.7
                                                                c.1 1.1.4 2.1.7 3.1
                                                                a2 2 0 0 1-.5 2.1L8 10.2
                                                                a16 16 0 0 0 6 6l1.3-1.3
                                                                a2 2 0 0 1 2.1-.5
                                                                c1 .4 2 .6 3.1.7
                                                                a2 2 0 0 1 1.5 1.8z" />
                                    </svg>
                                </div>

                                <div>
                                    <div class="kp-field-label">Mobile Number</div>
                                    <div class="kp-field-value">
                                        {{ $customerMobile }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>

                    {{-- Enquiries --}}

                    {{-- Enquiries --}}
                    <section class="kp-panel" id="enquiries">

                        <div class="kp-panel-head">
                            <div class="kp-panel-title">
                                <div class="kp-icon-box">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <rect x="5" y="3" width="14" height="18" rx="2" />
                                        <path d="M9 8h6M9 12h6M9 16h4" />
                                    </svg>
                                </div>

                                <div>
                                    <h2>My Enquiries</h2>
                                    <p>View your property enquiries and their status.</p>
                                </div>
                            </div>

                            <a href="{{ route('customer.enquiries') }}" class="kp-outline-btn">
                                View All →
                            </a>
                        </div>

                        @if(isset($recentEnquiries) && $recentEnquiries->count())

                            <div class="kp-enquiry-list">
                                @foreach($recentEnquiries as $enquiry)

                                                @php
                                                    $status = strtolower(
                                                        str_replace(' ', '-', $enquiry->status ?? 'new')
                                                    );
                                                @endphp

                                                <div class="kp-enquiry-item">

                                                    <div class="kp-enquiry-info">
                                                        <h3>
                                                            {{ $enquiry->property_title ?: 'Property Enquiry' }}
                                                        </h3>

                                                        <p>
                                                            Enquiry #{{ $enquiry->id }}
                                                            <span>•</span>
                                                            {{ $enquiry->created_at
                                    ? $enquiry->created_at->format('d M Y')
                                    : 'Date unavailable' }}
                                                        </p>

                                                        <p>
                                                            Move-in:
                                                            {{ $enquiry->move_in_date
                                    ? \Illuminate\Support\Carbon::parse($enquiry->move_in_date)->format('d M Y')
                                    : 'Not specified' }}
                                                        </p>
                                                    </div>

                                                    <div class="kp-enquiry-status">
                                                        <span class="kp-status status-{{ $status }}">
                                                            {{ ucwords(str_replace('-', ' ', $status)) }}
                                                        </span>
                                                    </div>

                                                </div>

                                @endforeach
                            </div>

                        @else

                            <div class="kp-empty">
                                <div class="kp-empty-art">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path d="M6 3h8l5 5v13H6z" />
                                        <path d="M14 3v5h5M9 12h7M9 16h7" />
                                        <path d="M3 7v14h12" />
                                    </svg>
                                </div>

                                <div class="kp-empty-content">
                                    <h3>No enquiries yet</h3>
                                    <p>Your property enquiries will appear here after you submit them.</p>

                                    <a href="{{ route('home') }}" class="kp-primary-btn">
                                        Browse Properties →
                                    </a>
                                </div>
                            </div>

                        @endif

                    </section>


                    {{-- Site Visits --}}

                    {{-- Site Visits --}}
                    <section class="kp-panel" id="visits">

                        <div class="kp-panel-head">
                            <div class="kp-panel-title">
                                <div class="kp-icon-box">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <rect x="3" y="5" width="18" height="16" rx="2" />
                                        <path d="M16 3v4M8 3v4M3 10h18" />
                                        <path d="M8 14h3M8 17h3M14 14h2" />
                                    </svg>
                                </div>

                                <div>
                                    <h2>My Site Visits</h2>
                                    <p>View your scheduled property visits.</p>
                                </div>
                            </div>

                            <a href="{{ route('customer.site-visits') }}" class="kp-outline-btn">
                                View All →
                            </a>
                        </div>

                        @if(isset($recentSiteVisits) && $recentSiteVisits->count())

                            <div class="kp-recent-visits">
                                @foreach($recentSiteVisits as $visit)

                                                @php
                                                    $status = strtolower(
                                                        str_replace(' ', '-', $visit->status ?? 'new')
                                                    );
                                                @endphp

                                                <div class="kp-recent-visit-item">

                                                    <div class="kp-recent-visit-info">
                                                        <h3>
                                                            {{ $visit->property_title ?: 'Property Visit' }}
                                                        </h3>

                                                        <p>
                                                            Booking #{{ $visit->id }}
                                                            <span>•</span>
                                                            {{ $visit->created_at
                                    ? $visit->created_at->format('d M Y')
                                    : 'Date unavailable' }}
                                                        </p>

                                                        <p>
                                                            <strong>Visit date:</strong>
                                                            {{ \Illuminate\Support\Carbon::parse($visit->visit_date)->format('d M Y') }}
                                                        </p>

                                                        <p>
                                                            <strong>Time:</strong>
                                                            {{ \Illuminate\Support\Carbon::parse($visit->visit_time)->format('h:i A') }}
                                                        </p>
                                                    </div>

                                                    <div class="kp-recent-visit-status">
                                                        <span class="kp-visit-status status-{{ $status }}">
                                                            {{ ucwords(str_replace('-', ' ', $status)) }}
                                                        </span>
                                                    </div>

                                                </div>

                                @endforeach
                            </div>

                        @else

                            <div class="kp-empty">
                                <div class="kp-empty-art">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <rect x="3" y="5" width="18" height="16" rx="2" />
                                        <path d="M16 3v4M8 3v4M3 10h18" />
                                        <path d="M8 14h2M14 14h2M8 17h2" />
                                    </svg>
                                </div>

                                <div class="kp-empty-content">
                                    <h3>No site visits scheduled</h3>
                                    <p>Your scheduled property visits will appear here.</p>

                                    <a href="{{ route('home') }}" class="kp-primary-btn">
                                        Explore Properties →
                                    </a>
                                </div>
                            </div>

                        @endif

                    </section>


                    {{-- Subscription --}}
                    <section class="kp-panel" id="subscription">

                        <div class="kp-panel-head">
                            <div class="kp-panel-title">
                                <div class="kp-icon-box">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <rect x="3" y="5" width="18" height="14" rx="2" />
                                        <path d="M3 10h18" />
                                    </svg>
                                </div>

                                <div>
                                    <h2>My Subscription</h2>
                                    <p>View your subscription plan and status.</p>
                                </div>
                            </div>

                            <a href="{{ route('subscription.index') }}" class="kp-primary-btn">
                                View Subscription →
                            </a>
                        </div>

                        <div class="kp-subscription-status">
                            <div class="kp-icon-box">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="m12 3 2.8 5.7 6.2.9-4.5 4.4
                                                            1.1 6.2-5.6-3-5.6 3 1.1-6.2L3 9.6l6.2-.9z" />
                                </svg>
                            </div>

                            <div class="kp-subscription-copy">
                                <h3>Manage Your Subscription</h3>
                                <p>Explore available plans and subscription details.</p>
                            </div>

                            <a href="{{ route('subscription.index') }}" class="kp-outline-btn">
                                Explore Plans →
                            </a>
                        </div>

                    </section>

                </main>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.kp-sidebar-nav a[href^="#"]').forEach(link => {
            link.addEventListener('click', function () {
                document.querySelectorAll('.kp-nav-link').forEach(item => {
                    item.classList.remove('active');
                });

                this.classList.add('active');
            });
        });
    </script>

@endsection