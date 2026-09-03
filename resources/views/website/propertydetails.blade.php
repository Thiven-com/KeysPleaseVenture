@extends('layouts.website')

@section('content')

    <style>
        /* =========================================================
                                                       PROPERTY DETAIL PAGE
                                                       RESPONSIVE: DESKTOP / LAPTOP / TABLET / MOBILE
                                                       PRIMARY COLOR: #1724c9
                                                    ========================================================= */

        :root {
            --blue: #00068a;
            --blue-dark: #00068a;
            --text: #252b3a;
            --muted: #68728a;
            --border: #e1e5ed;
            --light-blue: #f4f6ff;
        }

        /* =========================================================
                                                       GLOBAL
                                                    ========================================================= */

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        .page-grid,
        .breadcrumb {
            width: 100%;
        }

        button,
        input,
        select,
        textarea {
            font: inherit;
        }

        button {
            -webkit-tap-highlight-color: transparent;
        }

        /* =========================================================
                                                       BREADCRUMB
                                                    ========================================================= */

        .breadcrumb {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 5px;
            padding: 18px 30px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .breadcrumb a {
            color: var(--muted);
            text-decoration: none;
            transition: color .25s ease;
        }

        .breadcrumb a:hover {
            color: var(--blue);
        }

        .breadcrumb span {
            margin: 0 5px;
            color: #8992a6;
        }

        .breadcrumb strong {
            color: #3c465d;
            font-weight: 600;
        }

        /* =========================================================
                                                       MAIN GRID
                                                    ========================================================= */

        .page-grid {
            padding: 0 30px 50px;
            display: grid;
            grid-template-columns: minmax(0, 1fr) 385px;
            gap: 30px;
            align-items: start;
        }

        .left,
        .right,
        .details-main {
            min-width: 0;
        }

        .right {
            margin-top: 30px;
        }

        /* =========================================================
                                                       GALLERY
                                                    ========================================================= */

        .gallery {
            width: 100%;
            height: 430px;
            display: grid;
            grid-template-columns: minmax(0, 2.55fr) minmax(150px, .75fr);
            grid-template-rows: repeat(3, 1fr);
            gap: 5px;
            position: relative;
            overflow: hidden;
            background: #ddd;
            border-radius: 10px;
            box-shadow: 0 7px 25px rgba(25, 35, 75, .08);
        }

        .gallery img {
            width: 100%;
            height: 100%;
            min-width: 0;
            min-height: 0;
            display: block;
            object-fit: cover;
            transition:
                transform .6s cubic-bezier(.2, .8, .2, 1),
                filter .4s ease;
        }

        .gallery img:hover {
            transform: scale(1.045);
            filter: saturate(1.06);
        }

        .gallery .hero {
            grid-row: 1 / 4;
        }

        .featured {
            position: absolute;
            top: 16px;
            left: 14px;
            z-index: 5;
            padding: 7px 12px;
            border-radius: 16px;
            background: var(--blue);
            color: #fff;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .3px;
        }

        .fav {
            position: absolute;
            top: 15px;
            right: 15px;
            left: auto;
            z-index: 6;

            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 0;
            border: 0;
            border-radius: 50%;

            background: #fff;
            color: #667089;

            font-size: 20px;
            cursor: pointer;

            box-shadow: 0 5px 15px rgba(0, 0, 0, .14);
            transition: .25s ease;
        }

        .fav:hover {
            transform: scale(1.1);
            color: #e43763;
        }

        .photo-count,
        .more-count {
            position: absolute;
            z-index: 5;

            background: rgba(20, 20, 20, .76);
            color: #fff;

            padding: 8px 12px;
            border-radius: 6px;

            font-size: 12px;
            font-weight: 700;
        }

        .photo-count {
            left: 15px;
            bottom: 14px;
        }

        .more-count {
            top: 14px;
            right: 15px;
            font-size: 17px;
            background: rgba(10, 10, 10, .6);
        }

        .thumb-more {
            position: relative;
            min-width: 0;
            min-height: 0;
            overflow: hidden;
        }

        .thumb-more::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, .16);
            pointer-events: none;
            transition: .3s ease;
        }

        .thumb-more:hover::after {
            background: rgba(0, 0, 0, .04);
        }

        /* =========================================================
                                                       TITLE
                                                    ========================================================= */

        .title-area {
            position: relative;
            padding-top: 18px;
        }

        .title-row {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .verified-listing {
            flex: 0 0 auto;

            padding: 6px 10px;

            border: 1px solid #8de0b5;
            border-radius: 6px;

            background: #effdf6;
            color: #15965a;

            font-size: 11px;
            font-weight: 700;
        }

        .title {
            flex: 1 1 300px;

            margin: 0;

            color: var(--text);
            font-size: 25px;
            line-height: 1.3;
            font-weight: 800;
        }

        .title-actions {
            margin-left: auto;

            display: flex;
            align-items: center;
            gap: 9px;

            flex: 0 0 auto;
        }

        .small-action {
            min-height: 38px;

            padding: 8px 13px;

            border: 1px solid #d5dce9;
            border-radius: 6px;

            background: #fff;
            color: #24304f;

            cursor: pointer;
            transition: .25s ease;
        }

        .small-action:hover {
            border-color: #9ca9c8;
            color: var(--blue);
            transform: translateY(-2px);
            box-shadow: 0 5px 14px rgba(20, 30, 70, .08);
        }

        .location {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;

            margin-top: 10px;

            color: #56617a;
            font-size: 14px;
            line-height: 1.6;
        }

        .location>span {
            color: var(--blue);
        }

        .map-btn {
            margin-left: 5px;

            padding: 6px 10px;

            border: 1px solid #9aa9da;
            border-radius: 6px;

            background: #fff;
            color: var(--blue);

            font-size: 11px;
            font-weight: 700;

            cursor: pointer;
            transition: .25s ease;
        }

        .map-btn:hover {
            background: var(--light-blue);
            transform: translateY(-2px);
        }

        /* =========================================================
                                                       CONTENT COLUMNS
                                                    ========================================================= */

        .content-columns {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 270px;
            gap: 28px;
            margin-top: 18px;
        }

        /* =========================================================
                                                       PROPERTY META
                                                    ========================================================= */

        .meta-grid {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));

            overflow: hidden;

            border: 1px solid #e4e8f0;
            border-radius: 8px;

            background: #fff;
            box-shadow: 0 3px 14px rgba(25, 35, 75, .05);
        }

        .meta-item {
            min-width: 0;
            min-height: 64px;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 9px;
            padding: 8px;

            border-right: 1px solid #e4e8f0;

            transition: .25s ease;
        }

        .meta-item:last-child {
            border-right: 0;
        }

        .meta-item:hover {
            background: #fafbff;
        }

        .meta-icon {
            flex: 0 0 auto;
            color: var(--blue);
            font-size: 19px;
        }

        .meta-item b {
            display: block;
            color: #27314a;
            font-size: 14px;
            line-height: 1.3;
        }

        .meta-item small {
            display: block;
            margin-top: 3px;

            color: #69728a;
            font-size: 10px;
            line-height: 1.3;
        }

        /* =========================================================
                                                       SECTIONS
                                                    ========================================================= */

        .section {
            padding: 18px 0;
            border-bottom: 1px solid #e5e8ef;
        }

        .section h2 {
            margin: 0 0 10px;

            color: #252b3a;
            font-size: 16px;
            font-weight: 800;
        }

        .section p {
            margin: 0;

            color: #3f4961;
            font-size: 13px;
            line-height: 1.8;
        }

        /* =========================================================
                                                       AMENITIES
                                                    ========================================================= */

        .amenities {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 15px 12px;
            padding: 8px 0;
        }

        .amenity {
            min-width: 0;

            display: flex;
            align-items: center;

            gap: 9px;

            color: #2d3854;
            font-size: 13px;
            line-height: 1.4;

            transition: .25s ease;
        }

        .amenity:hover {
            color: var(--blue);
            transform: translateX(3px);
        }

        .amenity-icon {
            flex: 0 0 22px;

            width: 22px;

            text-align: center;
            color: var(--blue);
            font-size: 16px;
        }

        /* =========================================================
                                                       HIGHLIGHTS
                                                    ========================================================= */

        .highlights {
            align-self: start;

            margin: 0;

            padding: 18px;

            border: 1px solid #e2e6ee;
            border-radius: 10px;

            background: #fff;

            box-shadow: 0 4px 16px rgba(25, 35, 75, .06);
        }

        .highlights h3 {
            margin: 0 0 15px;

            color: #252b3a;
            font-size: 15px;
            font-weight: 800;
        }

        .highlight-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;

            gap: 15px;

            padding: 9px 0;

            border-bottom: 1px solid #eef0f4;

            color: #526079;
            font-size: 12px;
            line-height: 1.5;
        }

        .highlight-row:last-child {
            border-bottom: 0;
        }

        .highlight-row b {
            color: #26304c;
            font-weight: 700;
            text-align: right;
        }

        /* =========================================================
                                                       RIGHT SIDEBAR
                                                    ========================================================= */

        .price-card {
            padding: 20px;

            border-radius: 10px;

            background: linear-gradient(135deg,
                    #1723c900,
                    #1019a7);

            color: #fff;

            box-shadow: 0 10px 25px rgba(16, 25, 167, .2);
        }

        .price-line {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .price {
            font-size: 27px;
            line-height: 1.2;
            font-weight: 800;
        }

        .per {
            font-size: 12px;
        }

        .verified-badge {
            margin-left: auto;

            padding: 6px 9px;

            border-radius: 5px;

            background: #0b8d55;
            color: #fff;

            font-size: 10px;
            font-weight: 700;
        }

        .deposit {
            margin-top: 13px;
            font-size: 12px;
        }

        /* =========================================================
                                                       SIDE ACTIONS
                                                    ========================================================= */

        .side-actions {
            margin-top: 12px;
            padding: 15px;

            border: 1px solid #e1e5ed;
            border-radius: 10px;

            background: #fff;

            box-shadow: 0 5px 18px rgba(25, 35, 75, .07);
        }

        .primary-btn,
        .secondary-btn {
            width: 100%;
            min-height: 48px;

            border-radius: 7px;

            font-weight: 700;

            cursor: pointer;
            transition: .3s ease;
        }

        .primary-btn {
            border: 0;
            background: var(--blue);
            color: #fff;
        }

        .secondary-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            margin-top: 12px;

            border: 1px solid var(--blue);
            background: #fff;
            color: var(--blue);
        }

        .primary-btn:hover,
        .secondary-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(16, 25, 167, .17);
        }

        .primary-btn:active,
        .secondary-btn:active {
            transform: translateY(0);
        }

        /* =========================================================
                                                       BROKER / LOCATION
                                                    ========================================================= */

        .broker-card,
        .location-card {
            margin-top: 16px;
            padding: 18px;

            border: 1px solid #e1e5ed;
            border-radius: 10px;

            background: #fff;

            box-shadow: 0 5px 18px rgba(25, 35, 75, .06);
        }

        .broker-card h2,
        .location-card h2 {
            margin: 0 0 17px;

            color: #252b3a;
            font-size: 16px;
            font-weight: 800;
        }

        .broker {
            display: flex;
            align-items: center;
            gap: 14px;

            padding-bottom: 15px;

            border-bottom: 1px solid #e5e8ef;
        }

        .avatar {
            flex: 0 0 55px;

            width: 55px;
            height: 55px;

            display: grid;
            place-items: center;

            border-radius: 50%;

            background: #111;
            color: #d6b64e;

            font-size: 9px;
            line-height: 1.2;
            font-weight: 800;

            text-align: center;
        }

        .broker-name {
            font-size: 16px;
            font-weight: 800;
        }

        .broker-role {
            margin-top: 4px;
            color: #68728a;
            font-size: 11px;
        }

        .rating {
            margin-top: 8px;
            font-size: 12px;
        }

        .star {
            color: #f5ae17;
            font-size: 16px;
        }

        .rating span {
            color: #47526b;
        }

        .contact-row {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 11px 0;

            border-bottom: 1px solid #eef0f4;

            color: #4e5a73;
            font-size: 13px;
        }

        .contact-row:last-of-type {
            border-bottom: 0;
        }

        .contact-row i {
            width: 18px;
            color: var(--blue);
            text-align: center;
        }

        .all-properties {
            width: 100%;
            min-height: 40px;

            margin-top: 5px;

            border: 1px solid #9da9d4;
            border-radius: 6px;

            background: #fff;
            color: var(--blue);

            font-weight: 700;
            cursor: pointer;

            transition: .25s ease;
        }

        .all-properties:hover {
            background: var(--light-blue);
            transform: translateY(-2px);
        }

        .policy {
            margin-top: 16px;
            padding: 18px;

            border-radius: 10px;

            background: #eef6ff;
        }

        .policy-icon {
            float: left;

            margin-right: 12px;

            color: var(--blue);
            font-size: 35px;
            line-height: 1;
        }

        .policy b {
            color: #26304c;
            font-size: 13px;
        }

        .policy p {
            margin: 6px 0 0;

            color: #35415d;
            font-size: 12px;
            line-height: 1.65;
        }

        .location-text {
            margin-bottom: 16px;

            color: #536079;
            font-size: 13px;
            line-height: 1.7;
        }

        .map-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;

            padding: 9px 13px;

            border: 1px solid #a0add4;
            border-radius: 6px;

            background: #fff;
            color: var(--blue);

            font-weight: 700;

            cursor: pointer;
            transition: .25s ease;
        }

        .map-link:hover {
            background: var(--light-blue);
            transform: translateY(-2px);
        }

        /* =========================================================
                                                       SIMILAR PROPERTIES
                                                    ========================================================= */

        .similar-section {
            margin: 24px 0 50px;
        }

        .similar-head {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;
            margin-bottom: 14px;
        }

        .similar-head h2 {
            margin: 0;
            color: #252b3a;
            font-size: 17px;
            font-weight: 800;
        }

        .slider-btns {
            display: flex;
            gap: 8px;
            flex: 0 0 auto;
        }

        .slider-btn {
            width: 34px;
            height: 30px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid #dce1ea;
            border-radius: 6px;

            background: #fff;
            color: #303b56;

            cursor: pointer;
            transition: .25s ease;
        }

        .slider-btn:hover {
            background: var(--light-blue);
            color: var(--blue);
            transform: translateY(-2px);
        }

        .similar-list {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
        }

        .property-card {
            min-width: 0;

            overflow: hidden;

            border: 1px solid #e1e5ed;
            border-radius: 9px;

            background: #fff;

            box-shadow: 0 4px 15px rgba(25, 35, 75, .05);

            cursor: pointer;
            transition: .35s ease;
        }

        .property-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 30px rgba(25, 35, 75, .13);
        }

        .property-card img {
            width: 100%;
            height: 125px;

            display: block;

            object-fit: cover;

            transition: .55s ease;
        }

        .property-card:hover img {
            transform: scale(1.06);
        }

        .card-body {
            padding: 11px;
        }

        .card-price {
            color: var(--blue);
            font-size: 16px;
            font-weight: 800;
        }

        .card-price span {
            color: #68728a;
            font-size: 10px;
            font-weight: 400;
        }

        .card-title {
            margin-top: 5px;
            color: #26304c;
            font-size: 13px;
            font-weight: 700;
        }

        .card-meta {
            margin-top: 5px;

            color: #5e687e;
            font-size: 10px;
            line-height: 1.5;
        }

        /* =========================================================
                                                       MODAL
                                                       IMPORTANT:
                                                       ONLY ONE MODAL SYSTEM
                                                    ========================================================= */

        html.modal-open,
        body.modal-open {
            overflow: hidden !important;
            height: 100%;
            overscroll-behavior: none;
        }

        .property-modal {
            position: fixed;
            inset: 0;
            z-index: 99999;

            width: 100vw;
            height: 100vh;
            height: 100dvh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 24px;

            opacity: 0;
            visibility: hidden;
            pointer-events: none;

            background: transparent;

            overflow: hidden;

            transition:
                opacity .25s ease,
                visibility .25s ease;
        }

        .property-modal.active {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        .property-modal-overlay {
            position: absolute;
            inset: 0;

            width: 100%;
            height: 100%;

            background: rgba(8, 13, 40, .76);

            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);

            cursor: pointer;
        }

        .property-modal-box {
            position: relative;
            z-index: 2;

            width: min(650px, 100%);
            height: auto;
            max-height: calc(100dvh - 48px);

            overflow-x: hidden;
            overflow-y: auto;

            padding: 34px;

            border-radius: 20px;

            background: #fff;

            box-shadow: 0 30px 90px rgba(0, 0, 0, .30);

            transform: translateY(25px) scale(.97);

            transition: transform .3s ease;

            overscroll-behavior: contain;
            -webkit-overflow-scrolling: touch;

            scrollbar-width: thin;
        }

        .property-modal-box::-webkit-scrollbar {
            width: 6px;
        }

        .property-modal-box::-webkit-scrollbar-track {
            background: transparent;
        }

        .property-modal-box::-webkit-scrollbar-thumb {
            background: #c7ccdc;
            border-radius: 10px;
        }

        .property-modal.active .property-modal-box {
            transform: translateY(0) scale(1);
        }

        /* =========================================================
                                                       MODAL HEADER
                                                    ========================================================= */

        .property-modal-header {
            display: flex;
            align-items: flex-start;
            gap: 15px;

            padding-right: 45px;
            margin-bottom: 24px;
        }

        .property-modal-icon {
            flex: 0 0 48px;

            width: 48px;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: #eef0ff;
            color: var(--blue);

            font-size: 20px;
        }

        .property-modal-header span {
            display: block;

            margin-bottom: 5px;

            color: var(--blue);

            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .property-modal-header h2 {
            margin: 0;

            color: #202638;

            font-size: 22px;
            line-height: 1.3;
            font-weight: 800;
        }

        .property-modal-header p {
            margin: 7px 0 0;

            color: #68728a;

            font-size: 13px;
            line-height: 1.6;
        }

        /* =========================================================
                                                       MODAL FORM
                                                    ========================================================= */

        .property-modal-form {
            width: 100%;
        }

        .modal-form-row {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .modal-form-group {
            width: 100%;
            min-width: 0;
            margin-bottom: 17px;
        }

        .modal-form-group label {
            display: block;

            margin-bottom: 7px;

            color: #252b3a;

            font-size: 13px;
            font-weight: 700;
        }

        .modal-form-group input,
        .modal-form-group select,
        .modal-form-group textarea {
            display: block;

            width: 100%;
            max-width: 100%;

            border: 1px solid #dfe3ed;
            border-radius: 9px;

            background: #fff;
            color: #252b3a;

            font-family: inherit;
            font-size: 14px;

            outline: none;

            transition:
                border-color .2s ease,
                box-shadow .2s ease;
        }

        .modal-form-group input,
        .modal-form-group select {
            height: 48px;
            padding: 0 14px;
        }

        .modal-form-group textarea {
            min-height: 100px;
            padding: 13px 14px;

            resize: vertical;
        }

        .modal-form-group input:focus,
        .modal-form-group select:focus,
        .modal-form-group textarea:focus {
            border-color: var(--blue);

            box-shadow:
                0 0 0 3px rgba(23, 36, 201, .10);
        }

        /* =========================================================
                                                       CLOSE BUTTON
                                                    ========================================================= */

        .property-modal-close {
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 5;

            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 0;
            border-radius: 50%;

            background: #f2f4fb;
            color: #5f6880;

            cursor: pointer;

            transition: .25s ease;
        }

        .property-modal-close:hover {
            background: var(--blue);
            color: #fff;
            transform: rotate(90deg);
        }

        /* =========================================================
                                                       MODAL SUBMIT
                                                    ========================================================= */

        .modal-submit-btn {
            width: 100%;
            min-height: 51px;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 8px;

            border: 0;
            border-radius: 9px;

            background: var(--blue);
            color: #fff;

            font-weight: 700;

            cursor: pointer;

            transition: .25s ease;
        }

        .modal-submit-btn:hover {
            background: var(--blue-dark);

            transform: translateY(-2px);

            box-shadow:
                0 10px 25px rgba(23, 36, 201, .22);
        }

        /* =========================================================
                                                       TOAST
                                                    ========================================================= */

        .toast {
            position: fixed;
            left: 50%;
            bottom: 25px;
            z-index: 100001;

            max-width: calc(100% - 30px);

            padding: 13px 20px;

            border-radius: 8px;

            background: #111a43;
            color: #fff;

            box-shadow: 0 10px 28px rgba(0, 0, 0, .2);

            opacity: 0;
            visibility: hidden;

            transform: translate(-50%, 25px);

            transition: .3s ease;
        }

        .toast.show {
            opacity: 1;
            visibility: visible;
            transform: translate(-50%, 0);
        }

        /* =========================================================
                                                       BACK TO TOP
                                                    ========================================================= */

        .back-top {
            position: fixed;
            right: 24px;
            bottom: 24px;
            z-index: 200;

            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 0;
            border-radius: 50%;

            background: var(--blue);
            color: #fff;

            font-size: 18px;

            opacity: 0;
            visibility: hidden;

            transform: translateY(12px);

            transition: .3s ease;

            box-shadow: 0 8px 22px rgba(16, 25, 167, .28);

            cursor: pointer;
        }

        .back-top.show {
            opacity: 1;
            visibility: visible;
            transform: none;
        }

        .back-top:hover {
            transform: translateY(-4px);
        }

        /* =========================================================
                                                       LAPTOP
                                                       1200px - 1399px
                                                    ========================================================= */

        @media (max-width: 1399px) {

            .page-grid {
                grid-template-columns: minmax(0, 1fr) 350px;
                gap: 24px;
                padding-left: 25px;
                padding-right: 25px;
            }

            .breadcrumb {
                padding-left: 25px;
                padding-right: 25px;
            }

            .gallery {
                height: 400px;
            }

            .content-columns {
                grid-template-columns: minmax(0, 1fr) 250px;
                gap: 22px;
            }

            .amenities {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .similar-list {
                grid-template-columns: repeat(4, minmax(0, 1fr));
                gap: 12px;
            }
        }

        /* =========================================================
                                                       TABLET
                                                       768px - 1199px
                                                    ========================================================= */

        @media (max-width: 1199px) {

            .breadcrumb {
                padding: 17px 22px;
                font-size: 14px;
            }

            .page-grid {
                grid-template-columns: 1fr;
                gap: 24px;
                padding: 0 22px 45px;
            }

            .right {
                margin-top: 0;
            }

            .gallery {
                height: 430px;
            }

            .title {
                font-size: 27px;
            }

            .location {
                font-size: 15px;
            }

            .content-columns {
                grid-template-columns: 1fr;
                gap: 22px;
            }

            .meta-grid {
                grid-template-columns: repeat(5, minmax(0, 1fr));
            }

            .meta-item {
                min-height: 70px;
            }

            .meta-item b {
                font-size: 15px;
            }

            .meta-item small {
                font-size: 11px;
            }

            .meta-icon {
                font-size: 21px;
            }

            .section h2 {
                font-size: 18px;
            }

            .section p {
                font-size: 15px;
            }

            .amenities {
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 17px 15px;
            }

            .amenity {
                font-size: 14px;
            }

            .highlights {
                margin-bottom: 0;
            }

            .highlights h3 {
                font-size: 17px;
            }

            .highlight-row {
                font-size: 14px;
                padding: 10px 0;
            }

            .price-card {
                padding: 22px;
            }

            .price {
                font-size: 29px;
            }

            .side-actions {
                padding: 17px;
            }

            .primary-btn,
            .secondary-btn {
                min-height: 51px;
                font-size: 15px;
            }

            .broker-card h2,
            .location-card h2 {
                font-size: 18px;
            }

            .broker-name {
                font-size: 17px;
            }

            .contact-row,
            .location-text {
                font-size: 14px;
            }

            .similar-section {
                margin-top: 28px;
            }

            .similar-head h2 {
                font-size: 19px;
            }

            .similar-list {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 18px;
            }

            .property-card img {
                height: 175px;
            }

            .card-price {
                font-size: 18px;
            }

            .card-title {
                font-size: 15px;
            }

            .card-meta {
                font-size: 12px;
            }

            /* TABLET MODAL */

            .property-modal {
                padding: 22px;
                overflow: hidden;
            }

            .property-modal-box {
                width: min(680px, 100%);
                max-height: calc(100dvh - 44px);
                padding: 34px;
                overflow-x: hidden;
                overflow-y: auto;
            }

            .property-modal-header h2 {
                font-size: 24px;
            }

            .property-modal-header p {
                font-size: 14px;
            }

            .modal-form-group label {
                font-size: 14px;
            }

            .modal-form-group input,
            .modal-form-group select,
            .modal-form-group textarea {
                font-size: 15px;
            }

            .modal-form-group input,
            .modal-form-group select {
                height: 50px;
            }

            .modal-submit-btn {
                min-height: 53px;
                font-size: 15px;
            }
        }

        /* =========================================================
                                                       MOBILE
                                                       BELOW 768px
                                                    ========================================================= */

        @media (max-width: 767px) {

            .breadcrumb {
                padding: 14px 16px;
                font-size: 13px;
                gap: 3px;
            }

            .breadcrumb span {
                margin: 0 3px;
            }

            .page-grid {
                padding: 0 16px 35px;
                gap: 20px;
            }

            /* GALLERY */

            .gallery {
                height: 330px;

                grid-template-columns: 2fr 1fr;
                grid-template-rows: repeat(3, 1fr);

                gap: 4px;

                border-radius: 9px;
            }

            .fav {
                top: 12px;
                right: 12px;

                width: 40px;
                height: 40px;

                font-size: 19px;
            }

            .featured {
                top: 12px;
                left: 12px;

                padding: 6px 10px;

                font-size: 10px;
            }

            .photo-count {
                left: 12px;
                bottom: 12px;

                padding: 7px 10px;

                font-size: 11px;
            }

            .more-count {
                top: 12px;
                right: 12px;

                padding: 7px 10px;

                font-size: 15px;
            }

            /* TITLE */

            .title-area {
                padding-top: 15px;
            }

            .title-row {
                display: block;
            }

            .verified-listing {
                display: inline-flex;
                margin-bottom: 9px;

                font-size: 11px;
            }

            .title {
                width: 100%;

                font-size: 23px;
                line-height: 1.3;
            }

            .title-actions {
                margin-top: 13px;
                margin-left: 0;

                width: 100%;

                display: grid;
                grid-template-columns: 1fr 1fr;
            }

            .small-action {
                width: 100%;
                min-height: 42px;

                font-size: 13px;
            }

            .location {
                align-items: flex-start;

                margin-top: 12px;

                font-size: 14px;
            }

            .map-btn {
                margin-left: 0;
                margin-top: 4px;

                min-height: 38px;

                font-size: 12px;
            }

            /* META */

            .content-columns {
                margin-top: 16px;
                gap: 20px;
            }

            .meta-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .meta-item {
                min-height: 72px;

                justify-content: flex-start;

                padding: 10px 12px;

                border-right: 1px solid #e4e8f0;
                border-bottom: 1px solid #e4e8f0;
            }

            .meta-item:nth-child(2n) {
                border-right: 0;
            }

            .meta-item:nth-last-child(-n + 2) {
                border-bottom: 0;
            }

            .meta-item:last-child {
                grid-column: 1 / -1;
                justify-content: center;
                border-right: 0;
            }

            .meta-icon {
                font-size: 21px;
            }

            .meta-item b {
                font-size: 15px;
            }

            .meta-item small {
                font-size: 11px;
            }

            /* CONTENT */

            .section {
                padding: 17px 0;
            }

            .section h2 {
                font-size: 18px;
            }

            .section p {
                font-size: 14px;
                line-height: 1.75;
            }

            /* AMENITIES */

            .amenities {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 15px 12px;
            }

            .amenity {
                align-items: flex-start;

                font-size: 14px;
            }

            .amenity-icon {
                flex-basis: 24px;
                width: 24px;
                font-size: 17px;
            }

            /* HIGHLIGHTS */

            .highlights {
                padding: 17px;
            }

            .highlights h3 {
                font-size: 18px;
            }

            .highlight-row {
                font-size: 14px;
                padding: 10px 0;
            }

            /* SIDEBAR */

            .price-card {
                padding: 20px;
            }

            .price-line {
                flex-wrap: wrap;
            }

            .price {
                font-size: 27px;
            }

            .verified-badge {
                margin-left: auto;
            }

            .deposit {
                font-size: 13px;
            }

            .side-actions {
                padding: 15px;
            }

            .primary-btn,
            .secondary-btn {
                min-height: 51px;
                font-size: 15px;
            }

            /* BROKER */

            .broker-card,
            .location-card {
                padding: 17px;
            }

            .broker-card h2,
            .location-card h2 {
                font-size: 18px;
            }

            .broker-name {
                font-size: 17px;
            }

            .broker-role {
                font-size: 12px;
            }

            .contact-row,
            .location-text {
                font-size: 14px;
            }

            /* SIMILAR */

            .similar-section {
                margin: 25px 0 35px;
            }

            .similar-head h2 {
                font-size: 18px;
            }

            .similar-list {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
            }

            .property-card img {
                height: 135px;
            }

            .card-body {
                padding: 10px;
            }

            .card-price {
                font-size: 16px;
            }

            .card-title {
                font-size: 13px;
            }

            .card-meta {
                font-size: 10px;
            }

            /* =====================================================
                                                           MOBILE MODAL
                                                        ===================================================== */

            .property-modal {
                align-items: flex-start;

                width: 100vw;
                height: 100vh;
                height: 100dvh;

                padding: 12px;

                overflow: hidden;
            }

            .property-modal-box {
                width: 100%;
                max-width: 100%;

                height: calc(100dvh - 24px);
                max-height: calc(100dvh - 24px);

                margin: 0 auto;

                padding: 28px 20px;

                border-radius: 18px;

                overflow-x: hidden;
                overflow-y: auto;

                -webkit-overflow-scrolling: touch;
                overscroll-behavior: contain;
            }

            .property-modal-header {
                gap: 12px;

                padding-right: 38px;
                margin-bottom: 20px;
            }

            .property-modal-icon {
                flex-basis: 42px;

                width: 42px;
                height: 42px;

                border-radius: 10px;

                font-size: 18px;
            }

            .property-modal-header h2 {
                font-size: 21px;
            }

            .property-modal-header p {
                font-size: 13px;
            }

            .modal-form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .modal-form-group {
                margin-bottom: 16px;
            }

            .modal-form-group label {
                font-size: 14px;
            }

            .modal-form-group input,
            .modal-form-group select,
            .modal-form-group textarea {
                font-size: 15px;
            }

            .modal-form-group input,
            .modal-form-group select {
                height: 50px;
            }

            .modal-form-group textarea {
                min-height: 105px;
            }

            .modal-submit-btn {
                min-height: 53px;
                font-size: 15px;
            }

            .property-modal-close {
                top: 12px;
                right: 12px;

                width: 36px;
                height: 36px;
            }

            .back-top {
                right: 16px;
                bottom: 16px;
            }

            .toast {
                bottom: 18px;
                max-width: calc(100% - 24px);

                padding: 12px 16px;

                font-size: 13px;
            }
        }


        /* =========================================================
                                                       PREMIUM / RICH PROPERTY DETAILS ANIMATIONS
                                                       ---------------------------------------------------------
                                                       CSS-only enhancement.
                                                       Existing layout, colors, class names and functionality
                                                       remain unchanged.
                                                    ========================================================= */

        /* ---------- Animation variables ---------- */

        :root {
            --premium-ease: cubic-bezier(.22, 1, .36, 1);
            --premium-soft-ease: cubic-bezier(.16, 1, .3, 1);
        }

        /* ---------- Page entrance ---------- */

        .breadcrumb {
            animation: premiumFadeDown .65s var(--premium-ease) both;
        }

        .page-grid {
            animation: premiumPageReveal .85s var(--premium-ease) both;
        }

        @keyframes premiumPageReveal {
            from {
                opacity: 0;
                transform: translateY(18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes premiumFadeDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ---------- Luxury gallery ---------- */

        .gallery {
            animation: galleryReveal .9s var(--premium-ease) both;
            box-shadow:
                0 10px 30px rgba(25, 35, 75, .09),
                0 2px 8px rgba(23, 36, 201, .04);
        }

        @keyframes galleryReveal {
            from {
                opacity: 0;
                transform: translateY(22px) scale(.985);
                filter: saturate(.85);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
                filter: saturate(1);
            }
        }

        .gallery .hero img {
            transform-origin: center center;
            animation: heroImageReveal 1.25s var(--premium-soft-ease) both;
        }

        @keyframes heroImageReveal {
            from {
                opacity: 0;
                transform: scale(1.055);
                filter: blur(3px) saturate(.8);
            }

            to {
                opacity: 1;
                transform: scale(1);
                filter: blur(0) saturate(1);
            }
        }

        .gallery>*:not(.hero) img {
            animation: thumbReveal .8s var(--premium-ease) both;
        }

        .gallery>*:nth-child(2) img {
            animation-delay: .10s;
        }

        .gallery>*:nth-child(3) img {
            animation-delay: .18s;
        }

        .gallery>*:nth-child(4) img {
            animation-delay: .26s;
        }

        @keyframes thumbReveal {
            from {
                opacity: 0;
                transform: scale(1.04);
                filter: blur(2px);
            }

            to {
                opacity: 1;
                transform: scale(1);
                filter: blur(0);
            }
        }

        /* Rich image hover */

        .gallery .hero,
        .gallery .thumb-more {
            overflow: hidden;
        }

        .gallery .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            background:
                linear-gradient(115deg,
                    transparent 0%,
                    rgba(255, 255, 255, .14) 45%,
                    transparent 62%);
            transform: translateX(-120%);
            transition: transform 1s var(--premium-ease);
        }

        .gallery:hover .hero::after {
            transform: translateX(120%);
        }

        .gallery img {
            will-change: transform;
        }

        /* ---------- Featured badge ---------- */

        .featured {
            animation:
                premiumBadgeIn .7s .25s var(--premium-ease) both,
                premiumBadgeFloat 4s 1.1s ease-in-out infinite;
            box-shadow:
                0 7px 18px rgba(23, 36, 201, .25),
                inset 0 1px 0 rgba(255, 255, 255, .18);
        }

        @keyframes premiumBadgeIn {
            from {
                opacity: 0;
                transform: translateY(-10px) scale(.88);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes premiumBadgeFloat {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-2px);
            }
        }

        /* ---------- Favorite button ---------- */

        .fav {
            animation: favoriteReveal .7s .35s var(--premium-ease) both;
            will-change: transform, box-shadow;
        }

        @keyframes favoriteReveal {
            from {
                opacity: 0;
                transform: scale(.72) rotate(-12deg);
            }

            to {
                opacity: 1;
                transform: scale(1) rotate(0);
            }
        }

        .fav:hover {
            box-shadow:
                0 10px 25px rgba(228, 55, 99, .18),
                0 0 0 5px rgba(228, 55, 99, .06);
        }

        .fav:active {
            animation: favoritePress .28s ease;
        }

        @keyframes favoritePress {
            0% {
                transform: scale(1);
            }

            45% {
                transform: scale(.86);
            }

            100% {
                transform: scale(1);
            }
        }

        /* ---------- Photo counters ---------- */

        .photo-count,
        .more-count {
            backdrop-filter: blur(7px);
            -webkit-backdrop-filter: blur(7px);
            box-shadow: 0 7px 20px rgba(0, 0, 0, .15);
        }

        .photo-count {
            animation: counterIn .7s .45s var(--premium-ease) both;
        }

        .more-count {
            animation: counterIn .7s .52s var(--premium-ease) both;
        }

        @keyframes counterIn {
            from {
                opacity: 0;
                transform: translateY(9px) scale(.92);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* ---------- Title / location entrance ---------- */

        .title-area {
            animation: contentRise .8s .15s var(--premium-ease) both;
        }

        @keyframes contentRise {
            from {
                opacity: 0;
                transform: translateY(18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .verified-listing {
            animation: verifiedIn .65s .35s var(--premium-ease) both;
        }

        @keyframes verifiedIn {
            from {
                opacity: 0;
                transform: translateX(-10px) scale(.94);
            }

            to {
                opacity: 1;
                transform: translateX(0) scale(1);
            }
        }

        .title {
            animation: titleIn .85s .28s var(--premium-ease) both;
        }

        @keyframes titleIn {
            from {
                opacity: 0;
                transform: translateY(12px);
                letter-spacing: -.02em;
            }

            to {
                opacity: 1;
                transform: translateY(0);
                letter-spacing: normal;
            }
        }

        .location {
            animation: locationIn .75s .42s var(--premium-ease) both;
        }

        @keyframes locationIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ---------- Header action buttons ---------- */

        .title-actions .small-action {
            animation: actionIn .65s var(--premium-ease) both;
        }

        .title-actions .small-action:nth-child(1) {
            animation-delay: .42s;
        }

        .title-actions .small-action:nth-child(2) {
            animation-delay: .50s;
        }

        @keyframes actionIn {
            from {
                opacity: 0;
                transform: translateY(10px) scale(.96);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .small-action,
        .map-btn,
        .all-properties,
        .map-link,
        .slider-btn {
            position: relative;
            overflow: hidden;
        }

        .small-action::after,
        .map-btn::after,
        .all-properties::after,
        .map-link::after,
        .slider-btn::after {
            content: "";
            position: absolute;
            top: 0;
            left: -120%;
            width: 65%;
            height: 100%;
            pointer-events: none;
            background: linear-gradient(100deg,
                    transparent,
                    rgba(255, 255, 255, .58),
                    transparent);
            transform: skewX(-18deg);
            transition: left .7s var(--premium-ease);
        }

        .small-action:hover::after,
        .map-btn:hover::after,
        .all-properties:hover::after,
        .map-link:hover::after,
        .slider-btn:hover::after {
            left: 135%;
        }

        /* ---------- Meta information cards ---------- */

        .meta-grid {
            animation: metaContainerIn .8s .48s var(--premium-ease) both;
        }

        @keyframes metaContainerIn {
            from {
                opacity: 0;
                transform: translateY(18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .meta-item {
            position: relative;
            overflow: hidden;
            will-change: transform, background-color;
        }

        .meta-item::before {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            width: 0;
            height: 2px;
            background: var(--blue);
            transform: translateX(-50%);
            transition: width .35s var(--premium-ease);
        }

        .meta-item:hover::before {
            width: 55%;
        }

        .meta-item:hover {
            transform: translateY(-2px);
            box-shadow: inset 0 -1px 0 rgba(23, 36, 201, .08);
        }

        .meta-icon {
            transition:
                transform .35s var(--premium-ease),
                filter .35s ease;
        }

        .meta-item:hover .meta-icon {
            transform: translateY(-2px) scale(1.12);
            filter: drop-shadow(0 5px 7px rgba(23, 36, 201, .20));
        }

        /* ---------- Content sections ---------- */

        .section {
            animation: sectionReveal .75s var(--premium-ease) both;
        }

        .section:nth-child(1) {
            animation-delay: .58s;
        }

        .section:nth-child(2) {
            animation-delay: .66s;
        }

        .section:nth-child(3) {
            animation-delay: .74s;
        }

        @keyframes sectionReveal {
            from {
                opacity: 0;
                transform: translateY(14px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ---------- Amenities ---------- */

        .amenity {
            position: relative;
            transition:
                color .25s ease,
                transform .3s var(--premium-ease);
        }

        .amenity-icon {
            transition:
                transform .35s var(--premium-ease),
                filter .35s ease;
        }

        .amenity:hover .amenity-icon {
            transform: scale(1.18) rotate(-4deg);
            filter: drop-shadow(0 4px 6px rgba(23, 36, 201, .20));
        }

        /* ---------- Highlights ---------- */

        .highlights {
            animation: sidebarCardIn .85s .62s var(--premium-ease) both;
            transition:
                transform .35s var(--premium-ease),
                box-shadow .35s ease,
                border-color .35s ease;
        }

        .highlights:hover {
            transform: translateY(-4px);
            border-color: rgba(23, 36, 201, .18);
            box-shadow:
                0 16px 34px rgba(25, 35, 75, .10),
                0 3px 10px rgba(23, 36, 201, .04);
        }

        .highlight-row {
            transition:
                padding-left .3s var(--premium-ease),
                color .3s ease,
                background-color .3s ease;
        }

        .highlight-row:hover {
            padding-left: 7px;
            color: #26304c;
        }

        @keyframes sidebarCardIn {
            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* ---------- Price card: premium glow ---------- */

        .price-card {
            position: relative;
            overflow: hidden;
            isolation: isolate;
            animation: priceCardIn .9s .25s var(--premium-ease) both;
            box-shadow:
                0 14px 34px rgba(16, 25, 167, .22),
                0 3px 10px rgba(16, 25, 167, .08);
        }

        .price-card::before {
            content: "";
            position: absolute;
            inset: -40%;
            z-index: -1;
            pointer-events: none;
            background:
                radial-gradient(circle at 20% 20%,
                    rgba(255, 255, 255, .18),
                    transparent 28%);
            animation: priceGlow 5s ease-in-out infinite;
        }

        .price-card::after {
            content: "";
            position: absolute;
            top: 0;
            left: -120%;
            width: 70%;
            height: 100%;
            pointer-events: none;
            background: linear-gradient(105deg,
                    transparent,
                    rgba(255, 255, 255, .13),
                    transparent);
            transform: skewX(-18deg);
            animation: priceSweep 5.5s 1.5s ease-in-out infinite;
        }

        @keyframes priceCardIn {
            from {
                opacity: 0;
                transform: translateX(22px) scale(.97);
            }

            to {
                opacity: 1;
                transform: translateX(0) scale(1);
            }
        }

        @keyframes priceGlow {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
                opacity: .65;
            }

            50% {
                transform: translate(9%, 7%) scale(1.08);
                opacity: 1;
            }
        }

        @keyframes priceSweep {

            0%,
            58%,
            100% {
                left: -120%;
            }

            75% {
                left: 135%;
            }
        }

        .price {
            text-shadow: 0 2px 14px rgba(0, 0, 0, .16);
        }

        .verified-badge {
            animation: verifiedPulse 3.2s 1.3s ease-in-out infinite;
        }

        @keyframes verifiedPulse {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(11, 141, 85, 0);
            }

            50% {
                box-shadow: 0 0 0 5px rgba(11, 141, 85, .10);
            }
        }

        /* ---------- Sidebar actions ---------- */

        .side-actions {
            animation: sidebarCardIn .8s .40s var(--premium-ease) both;
        }

        .primary-btn,
        .secondary-btn {
            position: relative;
            overflow: hidden;
            will-change: transform, box-shadow;
        }

        .primary-btn::before,
        .secondary-btn::before {
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            background: linear-gradient(110deg,
                    transparent 20%,
                    rgba(255, 255, 255, .20) 48%,
                    transparent 70%);
            transform: translateX(-130%);
            transition: transform .75s var(--premium-ease);
        }

        .primary-btn:hover::before,
        .secondary-btn:hover::before {
            transform: translateX(130%);
        }

        .primary-btn:hover,
        .secondary-btn:hover {
            box-shadow:
                0 12px 28px rgba(16, 25, 167, .20),
                0 2px 6px rgba(16, 25, 167, .08);
        }

        /* ---------- Broker / location cards ---------- */

        .broker-card,
        .location-card,
        .policy {
            animation: cardRise .8s var(--premium-ease) both;
        }

        .broker-card {
            animation-delay: .48s;
        }

        .location-card {
            animation-delay: .58s;
        }

        .policy {
            animation-delay: .66s;
        }

        .broker-card,
        .location-card {
            transition:
                transform .35s var(--premium-ease),
                box-shadow .35s ease,
                border-color .35s ease;
        }

        .broker-card:hover,
        .location-card:hover {
            transform: translateY(-4px);
            border-color: rgba(23, 36, 201, .16);
            box-shadow:
                0 15px 32px rgba(25, 35, 75, .10),
                0 2px 8px rgba(23, 36, 201, .04);
        }

        @keyframes cardRise {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .avatar {
            transition:
                transform .4s var(--premium-ease),
                box-shadow .4s ease;
        }

        .broker-card:hover .avatar {
            transform: scale(1.06) rotate(-3deg);
            box-shadow:
                0 8px 18px rgba(0, 0, 0, .18),
                0 0 0 4px rgba(214, 182, 78, .08);
        }

        .star {
            display: inline-block;
            animation: starFloat 2.8s ease-in-out infinite;
        }

        @keyframes starFloat {

            0%,
            100% {
                transform: translateY(0) rotate(0);
            }

            50% {
                transform: translateY(-2px) rotate(-3deg);
            }
        }

        .contact-row {
            transition:
                padding-left .3s var(--premium-ease),
                background-color .3s ease;
        }

        .contact-row:hover {
            padding-left: 5px;
            background: linear-gradient(90deg,
                    rgba(23, 36, 201, .035),
                    transparent);
        }

        .contact-row i {
            transition:
                transform .3s var(--premium-ease),
                filter .3s ease;
        }

        .contact-row:hover i {
            transform: scale(1.15);
            filter: drop-shadow(0 3px 5px rgba(23, 36, 201, .18));
        }

        /* ---------- Policy ---------- */

        .policy {
            position: relative;
            overflow: hidden;
        }

        .policy::after {
            content: "";
            position: absolute;
            top: -80%;
            right: -18%;
            width: 130px;
            height: 260px;
            pointer-events: none;
            background: rgba(255, 255, 255, .35);
            transform: rotate(28deg);
            animation: policyShine 5s ease-in-out infinite;
        }

        @keyframes policyShine {

            0%,
            55%,
            100% {
                transform: translateX(0) rotate(28deg);
                opacity: 0;
            }

            68% {
                transform: translateX(-95px) rotate(28deg);
                opacity: 1;
            }
        }

        /* ---------- Similar properties ---------- */

        .similar-section {
            animation: similarReveal .9s .75s var(--premium-ease) both;
        }

        @keyframes similarReveal {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .property-card {
            transform: translateY(0);
            transition:
                transform .45s var(--premium-ease),
                box-shadow .45s ease,
                border-color .35s ease;
        }

        .property-card:hover {
            transform: translateY(-8px);
            border-color: rgba(23, 36, 201, .16);
            box-shadow:
                0 20px 38px rgba(25, 35, 75, .14),
                0 4px 12px rgba(23, 36, 201, .05);
        }

        .property-card img {
            transform-origin: center center;
        }

        .property-card:hover img {
            transform: scale(1.075);
            filter: saturate(1.08);
        }

        .card-body {
            transition: transform .35s var(--premium-ease);
        }

        .property-card:hover .card-body {
            transform: translateY(-1px);
        }

        .card-price {
            transition:
                transform .3s var(--premium-ease),
                color .3s ease;
        }

        .property-card:hover .card-price {
            transform: translateX(2px);
        }

        .property-card:nth-child(1) {
            animation: cardStagger .7s .85s var(--premium-ease) both;
        }

        .property-card:nth-child(2) {
            animation: cardStagger .7s .94s var(--premium-ease) both;
        }

        .property-card:nth-child(3) {
            animation: cardStagger .7s 1.03s var(--premium-ease) both;
        }

        .property-card:nth-child(4) {
            animation: cardStagger .7s 1.12s var(--premium-ease) both;
        }

        @keyframes cardStagger {
            from {
                opacity: 0;
                transform: translateY(18px) scale(.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* ---------- Modal premium entrance ---------- */

        .property-modal {
            transition:
                opacity .35s ease,
                visibility .35s ease;
        }

        .property-modal-overlay {
            opacity: 0;
            transition: opacity .4s ease;
        }

        .property-modal.active .property-modal-overlay {
            opacity: 1;
        }

        .property-modal-box {
            transform: translateY(30px) scale(.94);
            opacity: 0;
            filter: blur(3px);
            transition:
                transform .55s var(--premium-ease),
                opacity .45s ease,
                filter .45s ease;
            box-shadow:
                0 35px 100px rgba(0, 0, 0, .32),
                0 8px 30px rgba(23, 36, 201, .10);
        }

        .property-modal.active .property-modal-box {
            transform: translateY(0) scale(1);
            opacity: 1;
            filter: blur(0);
        }

        .property-modal-icon {
            transition:
                transform .4s var(--premium-ease),
                box-shadow .4s ease;
        }

        .property-modal-header:hover .property-modal-icon {
            transform: rotate(-4deg) scale(1.05);
            box-shadow: 0 8px 18px rgba(23, 36, 201, .12);
        }

        .modal-form-group {
            animation: modalFieldIn .55s var(--premium-ease) both;
        }

        .modal-form-group:nth-child(1) {
            animation-delay: .08s;
        }

        .modal-form-group:nth-child(2) {
            animation-delay: .14s;
        }

        .modal-form-group:nth-child(3) {
            animation-delay: .20s;
        }

        .modal-form-group:nth-child(4) {
            animation-delay: .26s;
        }

        @keyframes modalFieldIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .property-modal-close:hover {
            box-shadow: 0 8px 20px rgba(23, 36, 201, .18);
        }

        .modal-submit-btn {
            position: relative;
            overflow: hidden;
        }

        .modal-submit-btn::after {
            content: "";
            position: absolute;
            top: 0;
            left: -120%;
            width: 70%;
            height: 100%;
            pointer-events: none;
            background: linear-gradient(105deg,
                    transparent,
                    rgba(255, 255, 255, .22),
                    transparent);
            transform: skewX(-18deg);
            transition: left .75s var(--premium-ease);
        }

        .modal-submit-btn:hover::after {
            left: 135%;
        }

        /* ---------- Back-to-top premium motion ---------- */

        .back-top {
            transition:
                opacity .3s ease,
                visibility .3s ease,
                transform .4s var(--premium-ease),
                box-shadow .3s ease;
        }

        .back-top:hover {
            box-shadow:
                0 12px 28px rgba(16, 25, 167, .32),
                0 0 0 5px rgba(23, 36, 201, .07);
        }

        /* ---------- Toast ---------- */

        .toast {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        /* ---------- Reduced motion accessibility ---------- */

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: .01ms !important;
            }
        }

        /* ---------- Mobile performance / touch behavior ---------- */

        @media (max-width: 767px) {
            .gallery:hover .hero::after {
                transform: translateX(-120%);
            }

            .property-card:hover {
                transform: translateY(-4px);
            }

            .highlights:hover,
            .broker-card:hover,
            .location-card:hover {
                transform: translateY(-2px);
            }
        }






        /* =========================================================
                                           REPORT PROPERTY MODAL
                                        ========================================================= */

        .report-modal {
            position: fixed;
            inset: 0;
            z-index: 99999;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 20px;

            visibility: hidden;
            opacity: 0;
            pointer-events: none;

            transition:
                opacity .25s ease,
                visibility .25s ease;
        }

        .report-modal.active {
            visibility: visible;
            opacity: 1;
            pointer-events: auto;
        }

        /* Overlay */

        .report-overlay {
            position: absolute;
            inset: 0;

            background: rgba(12, 18, 38, .62);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        /* Dialog */

        .report-dialog {
            position: relative;
            z-index: 2;

            width: min(100%, 500px);
            max-height: calc(100vh - 40px);

            overflow-y: auto;

            background: #fff;
            border-radius: 20px;

            padding: 28px;

            box-shadow:
                0 30px 80px rgba(15, 23, 42, .25),
                0 8px 30px rgba(15, 23, 42, .12);

            transform: translateY(25px) scale(.97);

            transition:
                transform .3s cubic-bezier(.22, 1, .36, 1);
        }

        .report-modal.active .report-dialog {
            transform: translateY(0) scale(1);
        }

        /* Close */

        .report-close {
            position: absolute;
            top: 16px;
            right: 16px;

            width: 36px;
            height: 36px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 0;
            border-radius: 50%;

            background: #f3f5f9;
            color: #667089;

            font-size: 15px;

            cursor: pointer;

            transition:
                background .2s ease,
                color .2s ease,
                transform .2s ease;
        }

        .report-close:hover {
            background: #1724c9;
            color: #fff;
            transform: rotate(90deg);
        }

        /* Header */

        .report-header {
            display: flex;
            align-items: flex-start;
            gap: 15px;

            padding-right: 40px;
            margin-bottom: 25px;
        }

        .report-icon {
            flex: 0 0 48px;

            width: 48px;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 14px;

            background: rgba(23, 36, 201, .09);
            color: #1724c9;

            font-size: 19px;
        }

        .report-header h3 {
            margin: 2px 0 6px;

            color: #172033;

            font-size: 21px;
            line-height: 1.25;
            font-weight: 700;
        }

        .report-header p {
            margin: 0;

            color: #70798d;

            font-size: 12px;
            line-height: 1.6;
        }

        /* Fields */

        .report-field {
            margin-bottom: 17px;
        }

        .report-field>label {
            display: block;

            margin-bottom: 7px;

            color: #30394d;

            font-size: 12px;
            font-weight: 600;
        }

        .report-field>label span {
            color: #929aaa;
            font-weight: 400;
        }

        /* Input wrapper */

        .report-input {
            position: relative;
            width: 100%;
        }

        .report-input>i {
            position: absolute;
            left: 13px;
            top: 50%;

            z-index: 2;

            transform: translateY(-50%);

            color: #7c8496;

            font-size: 13px;

            pointer-events: none;
        }

        /* Inputs */

        .report-input input,
        .report-input select,
        .report-input textarea {
            box-sizing: border-box;

            width: 100%;
            max-width: 100%;

            border: 1px solid #dfe4ed;
            border-radius: 9px;

            background: #fff;
            color: #202940;

            font-family: inherit;
            font-size: 13px;

            outline: none;

            transition:
                border-color .2s ease,
                box-shadow .2s ease,
                background .2s ease;
        }

        .report-input input,
        .report-input select {
            height: 44px;

            padding: 0 38px;
        }

        .report-input textarea {
            min-height: 100px;

            padding: 12px 14px 12px 38px;

            resize: vertical;
            line-height: 1.55;
        }

        /* Readonly property */

        .report-input input[readonly] {
            background: #f7f8fb;
            color: #596277;
            cursor: default;
        }

        /* Select */

        .report-input select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;

            cursor: pointer;
        }

        .report-input:has(select)::after {
            content: "\f078";

            position: absolute;

            right: 14px;
            top: 50%;

            transform: translateY(-50%);

            font-family: "Font Awesome 6 Free";
            font-weight: 900;

            color: #1724c9;
            font-size: 9px;

            pointer-events: none;
        }

        /* Focus */

        .report-input input:focus,
        .report-input select:focus,
        .report-input textarea:focus {
            border-color: #1724c9;

            box-shadow:
                0 0 0 3px rgba(23, 36, 201, .08);
        }

        /* Notice */

        .report-notice {
            display: flex;
            align-items: flex-start;
            gap: 10px;

            margin: 5px 0 21px;

            padding: 12px 13px;

            border: 1px solid rgba(23, 36, 201, .10);
            border-radius: 10px;

            background: rgba(23, 36, 201, .045);
        }

        .report-notice i {
            flex: 0 0 auto;

            margin-top: 2px;

            color: #1724c9;
            font-size: 14px;
        }

        .report-notice p {
            margin: 0;

            color: #687186;

            font-size: 11px;
            line-height: 1.55;
        }

        /* Actions */

        .report-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
        }

        .report-cancel,
        .report-submit {
            min-height: 43px;

            padding: 10px 18px;

            border-radius: 9px;

            font-family: inherit;
            font-size: 12px;
            font-weight: 600;

            cursor: pointer;

            transition:
                transform .2s ease,
                box-shadow .2s ease,
                background .2s ease;
        }

        .report-cancel {
            border: 1px solid #dfe4ed;

            background: #fff;
            color: #5f687c;
        }

        .report-cancel:hover {
            background: #f6f7fa;
        }

        .report-submit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            border: 0;

            background: #1724c9;
            color: #fff;

            box-shadow: 0 8px 20px rgba(23, 36, 201, .18);
        }

        .report-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 25px rgba(23, 36, 201, .25);
        }

        /* Prevent body scrolling while modal is open */

        body.report-modal-open {
            overflow: hidden;
        }


        /* =========================================================
                                           TABLET
                                           481px–768px
                                        ========================================================= */

        @media (min-width: 481px) and (max-width: 768px) {

            .report-modal {
                padding: 18px;
            }

            .report-dialog {
                width: min(100%, 480px);
                padding: 25px;
            }

            .report-header h3 {
                font-size: 22px;
            }

            .report-header p {
                font-size: 13px;
            }

            .report-field>label {
                font-size: 13px;
            }

            .report-input input,
            .report-input select,
            .report-input textarea {
                font-size: 14px;
            }

            .report-input input,
            .report-input select {
                height: 46px;
            }
        }


        /* =========================================================
                                           MOBILE
                                           320px–480px
                                        ========================================================= */

        @media (min-width: 320px) and (max-width: 480px) {

            .report-modal {
                align-items: flex-end;
                padding: 0;
            }

            .report-dialog {
                width: 100%;
                max-width: none;

                max-height: 92vh;

                padding: 22px 18px 18px;

                border-radius: 20px 20px 0 0;

                transform: translateY(100%);
            }

            .report-modal.active .report-dialog {
                transform: translateY(0);
            }

            .report-header {
                gap: 12px;

                padding-right: 38px;

                margin-bottom: 21px;
            }

            .report-icon {
                flex-basis: 43px;

                width: 43px;
                height: 43px;

                border-radius: 12px;

                font-size: 17px;
            }

            .report-header h3 {
                font-size: 19px;
            }

            .report-header p {
                font-size: 11px;
                line-height: 1.5;
            }

            .report-field {
                margin-bottom: 14px;
            }

            .report-field>label {
                font-size: 12px;
            }

            .report-input input,
            .report-input select {
                height: 45px;
                font-size: 12px;
            }

            .report-input textarea {
                min-height: 90px;
                font-size: 12px;
            }

            .report-notice {
                margin-bottom: 17px;
            }

            .report-actions {
                display: grid;
                grid-template-columns: 1fr 1.5fr;
            }

            .report-cancel,
            .report-submit {
                width: 100%;
                min-height: 45px;
                font-size: 12px;
            }
        }


        /* =========================================================
                                           REDUCED MOTION
                                        ========================================================= */

        @media (prefers-reduced-motion: reduce) {

            .report-modal,
            .report-dialog,
            .report-close,
            .report-submit {
                transition: none;
            }
        }
    </style>


    <!-- =========================================================
                                                         BREADCRUMB
                                                    ========================================================= -->

    <div class="breadcrumb">

        <a href="{{ route('home') }}">
            <i class="fa-solid fa-house"></i> Home
        </a>

        <span>
            <i class="fa-solid fa-chevron-right"></i>
        </span>

        <a href="{{ route('rent') }}">
            Search Properties
        </a>

        <span>
            <i class="fa-solid fa-chevron-right"></i>
        </span>

        <a href="{{ route('rent', ['locality' => 'koramangala']) }}">
            Koramangala
        </a>

        <span>
            <i class="fa-solid fa-chevron-right"></i>
        </span>

        <a href="{{ route('rent', ['locality' => 'koramangala-4th-block']) }}">
            Koramangala 4th Block
        </a>

        <span>
            <i class="fa-solid fa-chevron-right"></i>
        </span>

        <strong>
            <i class="fa-solid fa-location-dot"></i>
            Property Details
        </strong>

    </div>


    <!-- =========================================================
                                                         MAIN PROPERTY CONTENT
                                                    ========================================================= -->

    <div class="page-grid">

        <!-- LEFT -->
        <section class="left">

            <!-- GALLERY -->
            <div class="gallery">

                <span class="featured">
                    FEATURED
                </span>

                <button type="button" class="fav" onclick="toggleFavourite(this)" aria-label="Add property to favourites">
                    <i class="fa-regular fa-heart"></i>
                </button>

                <img class="hero"
                    src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=1400&q=90"
                    alt="Living room">

                <img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=700&q=85"
                    alt="Kitchen">

                <img src="https://images.unsplash.com/photo-1600607688969-a5bfcd646154?auto=format&fit=crop&w=700&q=85"
                    alt="Bedroom">

                <div class="thumb-more">
                    <img src="https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?auto=format&fit=crop&w=700&q=85"
                        alt="Interior">
                </div>

                <div class="photo-count">
                    <i class="fa-regular fa-images"></i>
                    &nbsp;14 Photos
                </div>

                <!-- <div class="more-count">
                                                                    +10
                                                                </div> -->

            </div>


            <!-- TITLE -->
            <div class="title-area">

                <div class="title-row">

                    <span class="verified-listing">
                        <i class="fa-solid fa-circle-check"></i>
                        Verified Listing
                    </span>

                    <h1 class="title">
                        Spacious 3 BHK Apartment for Rent
                    </h1>

                    <div class="title-actions">

                        <button type="button" class="small-action" onclick="shareProperty()">
                            <i class="fa-solid fa-share-nodes"></i>
                            &nbsp; Share
                        </button>

                        <button type="button" class="small-action" onclick="openReportModal()">
                            <i class="fa-solid fa-flag"></i>
                            <span>Report</span>
                        </button>

                    </div>

                </div>


                <div class="location">

                    <span>
                        <i class="fa-solid fa-location-dot"></i>
                    </span>

                    <span>
                        Koramangala 4th Block, Koramangala,
                        Bangalore 560034
                    </span>

                    <button type="button" class="map-btn" onclick="openMap()">
                        <i class="fa-solid fa-location-dot"></i>
                        &nbsp; View on Map
                    </button>

                </div>

            </div>


            <!-- CONTENT -->
            <div class="content-columns">

                <div class="details-main">

                    <!-- META -->
                    <div class="meta-grid">

                        <div class="meta-item">
                            <span class="meta-icon">
                                <i class="fa-solid fa-bed"></i>
                            </span>

                            <div>
                                <b>3</b>
                                <small>Bedrooms</small>
                            </div>
                        </div>

                        <div class="meta-item">
                            <span class="meta-icon">
                                <i class="fa-solid fa-bath"></i>
                            </span>

                            <div>
                                <b>3</b>
                                <small>Bathrooms</small>
                            </div>
                        </div>

                        <div class="meta-item">
                            <span class="meta-icon">
                                <i class="fa-solid fa-ruler-combined"></i>
                            </span>

                            <div>
                                <b>1650 sq.ft</b>
                                <small>Super Built-up</small>
                            </div>
                        </div>

                        <div class="meta-item">
                            <span class="meta-icon">
                                <i class="fa-solid fa-couch"></i>
                            </span>

                            <div>
                                <b>Semi</b>
                                <small>Furnished</small>
                            </div>
                        </div>

                        <div class="meta-item">
                            <span class="meta-icon">
                                <i class="fa-solid fa-square-parking"></i>
                            </span>

                            <div>
                                <b>1</b>
                                <small>Car Parking</small>
                            </div>
                        </div>

                    </div>


                    <!-- OVERVIEW -->
                    <div class="section">

                        <h2>
                            Overview
                        </h2>

                        <p>
                            Spacious and beautifully designed 3 BHK apartment
                            available for rent in the prime location of
                            Koramangala 4th Block. This semi-furnished apartment
                            comes with modern interiors, ample natural light,
                            and excellent ventilation. Ideal for families and
                            working professionals.
                        </p>

                    </div>


                    <!-- AMENITIES -->
                    <div class="section">

                        <h2>
                            Amenities
                        </h2>

                        <div class="amenities">

                            <div class="amenity">
                                <span class="amenity-icon">
                                    <i class="fa-solid fa-droplet"></i>
                                </span>
                                24/7 Water Supply
                            </div>

                            <div class="amenity">
                                <span class="amenity-icon">
                                    <i class="fa-solid fa-bolt"></i>
                                </span>
                                Power Backup
                            </div>

                            <div class="amenity">
                                <span class="amenity-icon">
                                    <i class="fa-solid fa-elevator"></i>
                                </span>
                                Lift
                            </div>

                            <div class="amenity">
                                <span class="amenity-icon">
                                    <i class="fa-solid fa-square-parking"></i>
                                </span>
                                Car Parking
                            </div>

                            <div class="amenity">
                                <span class="amenity-icon">
                                    <i class="fa-solid fa-video"></i>
                                </span>
                                CCTV Security
                            </div>

                            <div class="amenity">
                                <span class="amenity-icon">
                                    <i class="fa-solid fa-shield-halved"></i>
                                </span>
                                Gated Community
                            </div>

                            <div class="amenity">
                                <span class="amenity-icon">
                                    <i class="fa-solid fa-dumbbell"></i>
                                </span>
                                Gym
                            </div>

                            <div class="amenity">
                                <span class="amenity-icon">
                                    <i class="fa-solid fa-cloud-rain"></i>
                                </span>
                                Rain Water Harvesting
                            </div>

                            <div class="amenity">
                                <span class="amenity-icon">
                                    <i class="fa-solid fa-fire-flame-simple"></i>
                                </span>
                                Gas Pipeline
                            </div>

                            <div class="amenity">
                                <span class="amenity-icon">
                                    <i class="fa-solid fa-child-reaching"></i>
                                </span>
                                Children Play Area
                            </div>

                        </div>

                    </div>


                    <!-- SIMILAR PROPERTIES -->
                    <div class="similar-section">

                        <div class="similar-head">

                            <h2>
                                Similar Properties You May Like
                            </h2>

                            <div class="slider-btns">

                                <button type="button" class="slider-btn" onclick="scrollSimilar(-1)"
                                    aria-label="Previous properties">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </button>

                                <button type="button" class="slider-btn" onclick="scrollSimilar(1)"
                                    aria-label="Next properties">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </button>

                            </div>

                        </div>


                        <div class="similar-list" id="similarList">

                            <div class="property-card" onclick="location.href='property_details.html#property2'">

                                <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=700&q=85"
                                    alt="2.5 BHK Apartment">

                                <div class="card-body">

                                    <div class="card-price">
                                        ₹ 42,000
                                        <span>/month</span>
                                    </div>

                                    <div class="card-title">
                                        2.5 BHK Apartment
                                    </div>

                                    <div class="card-meta">
                                        Koramangala 5th Block<br>
                                        1340 sq.ft · Semi Furnished
                                    </div>

                                </div>

                            </div>


                            <div class="property-card" onclick="location.href='property_details.html#property3'">

                                <img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=700&q=85"
                                    alt="3 BHK Apartment">

                                <div class="card-body">

                                    <div class="card-price">
                                        ₹ 50,000
                                        <span>/month</span>
                                    </div>

                                    <div class="card-title">
                                        3 BHK Apartment
                                    </div>

                                    <div class="card-meta">
                                        HSR Layout, Sector 2<br>
                                        1600 sq.ft · Furnished
                                    </div>

                                </div>

                            </div>


                            <div class="property-card" onclick="location.href='{{ route('rent') }}'">

                                <img src="https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?auto=format&fit=crop&w=700&q=85"
                                    alt="2 BHK Apartment">

                                <div class="card-body">

                                    <div class="card-price">
                                        ₹ 38,000
                                        <span>/month</span>
                                    </div>

                                    <div class="card-title">
                                        2 BHK Apartment
                                    </div>

                                    <div class="card-meta">
                                        Koramangala 8th Block<br>
                                        1100 sq.ft · Semi Furnished
                                    </div>

                                </div>

                            </div>


                            <div class="property-card" onclick="location.href='{{ route('rent') }}'">

                                <img src="https://images.unsplash.com/photo-1600210491892-03d54c0aaf87?auto=format&fit=crop&w=700&q=85"
                                    alt="3 BHK Apartment">

                                <div class="card-body">

                                    <div class="card-price">
                                        ₹ 55,000
                                        <span>/month</span>
                                    </div>

                                    <div class="card-title">
                                        3 BHK Apartment
                                    </div>

                                    <div class="card-meta">
                                        Indiranagar, 100 Ft Road<br>
                                        1800 sq.ft · Furnished
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- PROPERTY HIGHLIGHTS -->
                <aside class="highlights">

                    <h3>
                        Property Highlights
                    </h3>

                    <div class="highlight-row">
                        <span>Rent</span>
                        <b>₹ 45,000 /month</b>
                    </div>

                    <div class="highlight-row">
                        <span>Security Deposit</span>
                        <b>₹ 2,50,000</b>
                    </div>

                    <div class="highlight-row">
                        <span>Available From</span>
                        <b>15 Jun 2025</b>
                    </div>

                    <div class="highlight-row">
                        <span>Property Age</span>
                        <b>5 - 7 Years</b>
                    </div>

                    <div class="highlight-row">
                        <span>Furnishing</span>
                        <b>Semi Furnished</b>
                    </div>

                    <div class="highlight-row">
                        <span>Facing</span>
                        <b>East</b>
                    </div>

                    <div class="highlight-row">
                        <span>Floor</span>
                        <b>2 out of 4</b>
                    </div>

                    <div class="highlight-row">
                        <span>Maintenance</span>
                        <b>₹ 3,000 (Included)</b>
                    </div>

                </aside>

            </div>

        </section>


        <!-- =====================================================
                                                             RIGHT SIDEBAR
                                                        ====================================================== -->

        <aside class="right">

            <div class="price-card">

                <div class="price-line">

                    <span class="price">
                        ₹ 45,000
                    </span>

                    <span class="per">
                        /month
                    </span>

                    <span class="verified-badge">
                        <i class="fa-solid fa-circle-check"></i>
                        Verified
                    </span>

                </div>

                <div class="deposit">
                    Security Deposit: ₹ 2,50,000
                </div>

            </div>


            <div class="side-actions">

                <button type="button" class="primary-btn" onclick="openEnquiry()">
                    Enquire Now
                </button>

                <button type="button" class="secondary-btn" onclick="scheduleVisit()">
                    <i class="fa-regular fa-calendar-check"></i>
                    <span>Schedule Visit</span>
                </button>

            </div>


            <div class="broker-card">

                <h2>
                    Broker / Vendor Details
                </h2>

                <div class="broker">

                    <div class="avatar">
                        URBAN<br>
                        SPACES
                    </div>

                    <div>

                        <div class="broker-name">
                            Urban Spaces
                            <i class="fa-solid fa-circle-check" style="color:#1264d8"></i>
                        </div>

                        <div class="broker-role">
                            Verified Broker
                        </div>

                        <div class="rating">

                            <span class="star">
                                <i class="fa-solid fa-star"></i>
                            </span>

                            <b>4.8</b>

                            <span>
                                (120 Reviews)
                            </span>

                        </div>

                    </div>

                </div>


                <div class="contact-row">
                    <i class="fa-solid fa-phone"></i>
                    <span>+91 80 1234 5678</span>
                </div>

                <div class="contact-row">
                    <i class="fa-solid fa-envelope"></i>
                    <span>info@urbanspaces.in</span>
                </div>

                <button type="button" class="all-properties" onclick="location.href='{{ route('rent') }}'">
                    View All Properties
                </button>

            </div>


            <div class="policy">

                <div class="policy-icon">
                    <i class="fa-solid fa-circle-info"></i>
                </div>

                <b>
                    Brokerage Policy
                </b>

                <p>
                    One month's rent will be applicable as brokerage
                    upon successful closure of the rental agreement /
                    deal.
                </p>

            </div>


            <div class="location-card">

                <h2>
                    <i class="fa-solid fa-location-dot"></i>
                    &nbsp; Location
                </h2>

                <div class="location-text">
                    Koramangala 4th Block,<br>
                    Koramangala, Bangalore 560034
                </div>

                <button type="button" class="map-link" onclick="openMap()">
                    View on Map
                    <i class="fa-solid fa-location-dot"></i>
                </button>

            </div>

        </aside>

    </div>


    <!-- =========================================================
                                                         ENQUIRY MODAL
                                                    ========================================================= -->

    <div class="property-modal" id="enquiryModal" aria-hidden="true">

        <div class="property-modal-overlay" onclick="closeEnquiry()"></div>


        <div class="property-modal-box" role="dialog" aria-modal="true" aria-labelledby="enquiryModalTitle">

            {{-- Close --}}
            <button type="button" class="property-modal-close" onclick="closeEnquiry()" aria-label="Close enquiry form">
                <i class="fa-solid fa-xmark"></i>
            </button>


            {{-- Header --}}
            <div class="property-modal-header">

                <div class="property-modal-icon">
                    <i class="fa-solid fa-house"></i>
                </div>

                <div>

                    <span>
                        RENTAL ENQUIRY
                    </span>

                    <h2 id="enquiryModalTitle">
                        Enquire About Rental Property
                    </h2>

                    <p>
                        Share your rental requirements and our property
                        expert will contact you shortly.
                    </p>

                </div>

            </div>


            {{-- Form --}}
            <form action="{{ route('rental.requirments.enquiry.store') }}" method="POST" class="property-modal-form"
                id="rentalRequirementsForm">
                @csrf



                {{-- Name + Phone --}}
                <div class="modal-form-row">

                    <div class="modal-form-group">

                        <label for="enquiry_name">
                            Full Name
                        </label>

                        <input type="text" id="enquiry_name" name="name" placeholder="Enter your full name" required>

                    </div>


                    <div class="modal-form-group">

                        <label for="enquiry_phone">
                            Phone Number
                        </label>

                        <input type="tel" id="enquiry_phone" name="phone" placeholder="Enter your phone number" required>

                    </div>

                </div>


                {{-- Email --}}
                <div class="modal-form-group">

                    <label for="enquiry_email">
                        Email Address
                    </label>

                    <input type="email" id="enquiry_email" name="email" placeholder="Enter your email address" required>

                </div>


                {{-- Rental Property Type + Monthly Rent --}}
                <div class="modal-form-row">

                    <div class="modal-form-group">

                        <label for="enquiry_property">
                            Rental Property Type
                        </label>

                        <select id="enquiry_property" name="property_type" required>

                            <option value="">
                                Select property type
                            </option>

                            <option value="apartment">
                                Apartment
                            </option>

                            <option value="villa">
                                Villa
                            </option>

                            <option value="independent-house">
                                Independent House
                            </option>

                            <option value="office">
                                Office
                            </option>

                            <option value="commercial">
                                Commercial Property
                            </option>

                        </select>

                    </div>


                    <div class="modal-form-group">

                        <label for="enquiry_budget">
                            Monthly Rent
                        </label>

                        <select id="enquiry_budget" name="budget">

                            <option value="">
                                Select monthly rent
                            </option>

                            <option value="below-10k">
                                Below ₹10,000
                            </option>

                            <option value="10k-20k">
                                ₹10,000 – ₹20,000
                            </option>

                            <option value="20k-30k">
                                ₹20,000 – ₹30,000
                            </option>

                            <option value="30k-50k">
                                ₹30,000 – ₹50,000
                            </option>

                            <option value="above-50k">
                                Above ₹50,000
                            </option>

                        </select>

                    </div>

                </div>


                {{-- Move In + Furnishing --}}
                <div class="modal-form-row">

                    <div class="modal-form-group">

                        <label for="move_in_date">
                            Preferred Move-in Date
                        </label>

                        <input type="date" id="move_in_date" name="move_in_date">

                    </div>


                    <div class="modal-form-group">

                        <label for="furnishing">
                            Furnishing Preference
                        </label>

                        <select id="furnishing" name="furnishing">

                            <option value="">
                                Select furnishing
                            </option>

                            <option value="fully-furnished">
                                Fully Furnished
                            </option>

                            <option value="semi-furnished">
                                Semi Furnished
                            </option>

                            <option value="unfurnished">
                                Unfurnished
                            </option>

                            <option value="any">
                                Any

                            </option>

                        </select>

                    </div>

                </div>


                {{-- Preferred Contact --}}
                <div class="modal-form-group">

                    <label for="preferred_contact">
                        Preferred Contact Method
                    </label>

                    <select id="preferred_contact" name="preferred_contact" required>

                        <option value="">
                            Select contact method
                        </option>

                        <option value="phone">
                            Phone Call
                        </option>

                        <option value="whatsapp">
                            WhatsApp
                        </option>

                        <option value="email">
                            Email
                        </option>

                    </select>

                </div>


                {{-- Message --}}
                <div class="modal-form-group">

                    <label for="enquiry_message">
                        Rental Requirements
                    </label>

                    <textarea id="enquiry_message" name="message" rows="4"
                        placeholder="Tell us your preferred location, number of bedrooms, family/bachelor requirement, parking, or any other rental requirements..."></textarea>

                </div>


                {{-- Submit --}}
                <button type="submit" class="modal-submit-btn">

                    <i class="fa-solid fa-paper-plane"></i>

                    Send Rental Enquiry

                </button>

            </form>

        </div>

    </div>


    <!-- =========================================================
                                                         SCHEDULE VISIT MODAL
                                                    ========================================================= -->

    <div class="property-modal" id="visitModal" aria-hidden="true">

        <div class="property-modal-overlay" onclick="closeVisit()"></div>


        <div class="property-modal-box" role="dialog" aria-modal="true" aria-labelledby="visitModalTitle">

            {{-- Close --}}
            <button type="button" class="property-modal-close" onclick="closeVisit()"
                aria-label="Close schedule visit form">
                <i class="fa-solid fa-xmark"></i>
            </button>


            {{-- Header --}}
            <div class="property-modal-header">

                <div class="property-modal-icon">
                    <i class="fa-regular fa-calendar-check"></i>
                </div>

                <div>

                    <span>
                        SCHEDULE A RENTAL VISIT
                    </span>

                    <h2 id="visitModalTitle">
                        Schedule a Property Visit
                    </h2>

                    <p>
                        Choose your preferred date and time to
                        visit this rental property.
                    </p>

                </div>

            </div>


            {{-- Form --}}
            <form action="#" method="POST" class="property-modal-form">

                @csrf


                {{-- Name + Phone --}}
                <div class="modal-form-row">

                    <div class="modal-form-group">

                        <label for="visit_name">
                            Full Name
                        </label>

                        <input type="text" id="visit_name" name="name" placeholder="Enter your full name" required>

                    </div>


                    <div class="modal-form-group">

                        <label for="visit_phone">
                            Phone Number
                        </label>

                        <input type="tel" id="visit_phone" name="phone" placeholder="Enter your phone number" required>

                    </div>

                </div>


                {{-- Date + Time --}}
                <div class="modal-form-row">

                    <div class="modal-form-group">

                        <label for="visit_date">
                            Preferred Visit Date
                        </label>

                        <input type="date" id="visit_date" name="visit_date" required>

                    </div>


                    <div class="modal-form-group">

                        <label for="visit_time">
                            Preferred Time
                        </label>

                        <select id="visit_time" name="visit_time" required>

                            <option value="">
                                Select preferred time
                            </option>

                            <option value="09:00">
                                09:00 AM
                            </option>

                            <option value="10:00">
                                10:00 AM
                            </option>

                            <option value="11:00">
                                11:00 AM
                            </option>

                            <option value="12:00">
                                12:00 PM
                            </option>

                            <option value="14:00">
                                02:00 PM
                            </option>

                            <option value="15:00">
                                03:00 PM
                            </option>

                            <option value="16:00">
                                04:00 PM
                            </option>

                            <option value="17:00">
                                05:00 PM
                            </option>

                            <option value="18:00">
                                06:00 PM
                            </option>

                        </select>

                    </div>

                </div>


                {{-- Rental Requirement --}}
                <div class="modal-form-row">

                    <div class="modal-form-group">

                        <label for="visit_property_type">
                            Rental Property Type
                        </label>

                        <select id="visit_property_type" name="property_type" required>

                            <option value="">
                                Select property type
                            </option>

                            <option value="apartment">
                                Apartment
                            </option>

                            <option value="villa">
                                Villa
                            </option>

                            <option value="independent-house">
                                Independent House
                            </option>

                            <option value="office">
                                Office
                            </option>

                            <option value="commercial">
                                Commercial Property
                            </option>

                        </select>

                    </div>


                    <div class="modal-form-group">

                        <label for="visit_rent">
                            Preferred Monthly Rent
                        </label>

                        <select id="visit_rent" name="monthly_rent">

                            <option value="">
                                Select monthly rent
                            </option>

                            <option value="below-10k">
                                Below ₹10,000
                            </option>

                            <option value="10k-20k">
                                ₹10,000 – ₹20,000
                            </option>

                            <option value="20k-30k">
                                ₹20,000 – ₹30,000
                            </option>

                            <option value="30k-50k">
                                ₹30,000 – ₹50,000
                            </option>

                            <option value="above-50k">
                                Above ₹50,000
                            </option>

                        </select>

                    </div>

                </div>


                {{-- Additional Requirements --}}
                <div class="modal-form-group">

                    <label for="visit_message">
                        Rental Requirements
                    </label>

                    <textarea id="visit_message" name="message" rows="3"
                        placeholder="Mention your preferred location, bedrooms, furnishing, parking, family/bachelor requirement, or any other requirements..."></textarea>

                </div>


                {{-- Submit --}}
                <button type="submit" class="modal-submit-btn">

                    <i class="fa-regular fa-calendar-check"></i>

                    Schedule Rental Visit

                </button>

            </form>

        </div>

    </div>



    <!-- =========================================================
                                                     REPORT PROPERTY MODAL
                                                ========================================================= -->

    <div class="report-modal" id="reportModal" aria-hidden="true">

        <div class="report-overlay" onclick="closeReportModal()"></div>

        <div class="report-dialog" role="dialog" aria-modal="true" aria-labelledby="reportModalTitle">

            <button type="button" class="report-close" onclick="closeReportModal()" aria-label="Close report form">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <!-- Header -->
            <div class="report-header">

                <div class="report-icon">
                    <i class="fa-solid fa-flag"></i>
                </div>

                <div>
                    <h3 id="reportModalTitle">
                        Report Property
                    </h3>

                    <p>
                        Found something incorrect or suspicious?
                        Let us know so our team can review it.
                    </p>
                </div>

            </div>


            <form id="reportPropertyForm">

                <!-- Property -->
                <div class="report-field">

                    <label for="reportProperty">
                        Property
                    </label>

                    <div class="report-input">

                        <i class="fa-solid fa-house"></i>

                        <input type="text" id="reportProperty" value="Spacious 3 BHK Apartment" readonly>

                    </div>

                </div>


                <!-- Reason -->
                <div class="report-field">

                    <label for="reportReason">
                        What is wrong with this property?
                    </label>

                    <div class="report-input">

                        <i class="fa-solid fa-circle-exclamation"></i>

                        <select id="reportReason" required>

                            <option value="">
                                Select a reason
                            </option>

                            <option value="already_rented">
                                Property is already rented
                            </option>

                            <option value="incorrect_information">
                                Incorrect property information
                            </option>

                            <option value="incorrect_price">
                                Incorrect rent / price
                            </option>

                            <option value="incorrect_location">
                                Incorrect location
                            </option>

                            <option value="duplicate">
                                Duplicate listing
                            </option>

                            <option value="fake_listing">
                                Fake or suspicious listing
                            </option>

                            <option value="wrong_contact">
                                Wrong contact details
                            </option>

                            <option value="misleading_photos">
                                Misleading photos
                            </option>

                            <option value="other">
                                Other
                            </option>

                        </select>

                    </div>

                </div>


                <!-- Additional message -->
                <div class="report-field">

                    <label for="reportMessage">
                        Additional Details
                        <span>(Optional)</span>
                    </label>

                    <div class="report-input report-textarea">

                        <i class="fa-regular fa-message"></i>

                        <textarea id="reportMessage" rows="4" placeholder="Tell us what you noticed..."></textarea>

                    </div>

                </div>


                <!-- Notice -->
                <div class="report-notice">

                    <i class="fa-solid fa-shield-halved"></i>

                    <p>
                        Your report will be reviewed by our team.
                        Reporting a property does not automatically
                        remove the listing.
                    </p>

                </div>


                <!-- Actions -->
                <div class="report-actions">

                    <button type="button" class="report-cancel" onclick="closeReportModal()">
                        Cancel
                    </button>

                    <button type="submit" class="report-submit">
                        <i class="fa-solid fa-paper-plane"></i>
                        Submit Report
                    </button>

                </div>

            </form>

        </div>

    </div>


    <!-- =========================================================
                                                         SCRIPT
                                                    ========================================================= -->


    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const header = document.getElementById("header");
            const toast = document.getElementById("toast");


            /* =====================================================
               HEADER
            ===================================================== */

            window.addEventListener("scroll", function () {

                if (header) {
                    header.classList.toggle(
                        "scrolled",
                        window.scrollY > 15
                    );
                }

            }, { passive: true });



            /* =====================================================
               TOAST
            ===================================================== */

            window.showToast = function (message) {

                if (!toast) return;

                toast.textContent = message;

                toast.classList.add("show");

                clearTimeout(window.toastTimer);

                window.toastTimer = setTimeout(function () {
                    toast.classList.remove("show");
                }, 2400);

            };



            /* =====================================================
               FAVOURITE
            ===================================================== */

            window.toggleFavourite = function (button) {

                if (!button) return;

                const icon = button.querySelector("i");

                if (!icon) return;

                const isFavourite =
                    icon.classList.contains("fa-solid");


                if (isFavourite) {

                    icon.classList.remove("fa-solid");
                    icon.classList.add("fa-regular");

                    button.style.color = "#667089";

                    window.showToast(
                        "Removed from favourites"
                    );

                } else {

                    icon.classList.remove("fa-regular");
                    icon.classList.add("fa-solid");

                    button.style.color = "#e52d5f";

                    window.showToast(
                        "Added to favourites"
                    );

                }


                if (button.animate) {

                    button.animate(
                        [
                            {
                                transform: "scale(1)"
                            },
                            {
                                transform: "scale(1.15)"
                            },
                            {
                                transform: "scale(1)"
                            }
                        ],
                        {
                            duration: 300,
                            easing: "ease-out"
                        }
                    );

                }

            };



            /* =====================================================
               SHARE
            ===================================================== */

            window.shareProperty = async function () {

                const title =
                    "Spacious 3 BHK Apartment for Rent";

                const text =
                    "Koramangala 4th Block, Bangalore";

                const url =
                    window.location.href;


                if (navigator.share) {

                    try {

                        await navigator.share({
                            title: title,
                            text: text,
                            url: url
                        });

                    } catch (error) {

                        if (error.name !== "AbortError") {

                            console.log(
                                "Share failed:",
                                error
                            );

                        }

                    }

                    return;
                }


                try {

                    if (
                        navigator.clipboard &&
                        navigator.clipboard.writeText
                    ) {

                        await navigator.clipboard.writeText(url);

                        window.showToast(
                            "Property link copied"
                        );

                    } else {

                        window.showToast(
                            "Unable to copy property link"
                        );

                    }

                } catch (error) {

                    window.showToast(
                        "Unable to copy property link"
                    );

                }

            };



            /* =====================================================
               GOOGLE MAP
            ===================================================== */

            window.openMap = function () {

                const location =
                    "Koramangala 4th Block, Bangalore";

                const mapUrl =
                    "https://www.google.com/maps/search/?api=1&query=" +
                    encodeURIComponent(location);

                window.open(
                    mapUrl,
                    "_blank",
                    "noopener,noreferrer"
                );

            };



            /* =====================================================
               LOCK BODY
            ===================================================== */

            function lockPage() {

                document.documentElement.classList.add(
                    "modal-open"
                );

                document.body.classList.add(
                    "modal-open"
                );

            }



            /* =====================================================
               UNLOCK BODY
            ===================================================== */

            function unlockPage() {

                const enquiry =
                    document.getElementById("enquiryModal");

                const visit =
                    document.getElementById("visitModal");


                const enquiryOpen =
                    enquiry &&
                    enquiry.classList.contains("active");


                const visitOpen =
                    visit &&
                    visit.classList.contains("active");


                if (!enquiryOpen && !visitOpen) {

                    document.documentElement.classList.remove(
                        "modal-open"
                    );

                    document.body.classList.remove(
                        "modal-open"
                    );

                }

            }



            /* =====================================================
               OPEN ENQUIRY
            ===================================================== */

            window.openEnquiry = function () {

                const modal =
                    document.getElementById("enquiryModal");

                if (!modal) return;


                const visit =
                    document.getElementById("visitModal");


                if (visit) {

                    visit.classList.remove("active");

                    visit.setAttribute(
                        "aria-hidden",
                        "true"
                    );

                }


                modal.classList.add("active");

                modal.setAttribute(
                    "aria-hidden",
                    "false"
                );


                lockPage();


                const box =
                    modal.querySelector(
                        ".property-modal-box"
                    );


                if (box) {
                    box.scrollTop = 0;
                }


                setTimeout(function () {

                    const input =
                        document.getElementById(
                            "enquiry_name"
                        );


                    if (input) {

                        input.focus({
                            preventScroll: true
                        });

                    }

                }, 250);

            };



            /* =====================================================
               CLOSE ENQUIRY
            ===================================================== */

            window.closeEnquiry = function () {

                const modal =
                    document.getElementById("enquiryModal");

                if (!modal) return;


                modal.classList.remove("active");

                modal.setAttribute(
                    "aria-hidden",
                    "true"
                );


                unlockPage();

            };



            /* =====================================================
               OPEN VISIT
            ===================================================== */

            window.scheduleVisit = function () {

                const modal =
                    document.getElementById("visitModal");

                if (!modal) return;


                const enquiry =
                    document.getElementById("enquiryModal");


                if (enquiry) {

                    enquiry.classList.remove("active");

                    enquiry.setAttribute(
                        "aria-hidden",
                        "true"
                    );

                }


                modal.classList.add("active");

                modal.setAttribute(
                    "aria-hidden",
                    "false"
                );


                lockPage();


                const box =
                    modal.querySelector(
                        ".property-modal-box"
                    );


                if (box) {
                    box.scrollTop = 0;
                }


                setTimeout(function () {

                    const input =
                        document.getElementById(
                            "visit_name"
                        );


                    if (input) {

                        input.focus({
                            preventScroll: true
                        });

                    }

                }, 250);

            };



            /* =====================================================
               CLOSE VISIT
            ===================================================== */

            window.closeVisit = function () {

                const modal =
                    document.getElementById("visitModal");

                if (!modal) return;


                modal.classList.remove("active");

                modal.setAttribute(
                    "aria-hidden",
                    "true"
                );


                unlockPage();

            };



            /* =====================================================
               RENTAL REQUIREMENTS ENQUIRY SUBMIT

               Separate Form ID:
               rentalRequirementsForm

               Route:
               rental.requirments.enquiry.store
            ===================================================== */

            const rentalRequirementsForm =
                document.getElementById(
                    "rentalRequirementsForm"
                );


            if (rentalRequirementsForm) {

                rentalRequirementsForm.addEventListener(
                    "submit",
                    async function (event) {

                        event.preventDefault();

                        const submitButton =
                            rentalRequirementsForm.querySelector(
                                ".modal-submit-btn"
                            );

                        const originalButtonText =
                            submitButton
                                ? submitButton.innerHTML
                                : "";


                        /* =========================================
                           BUTTON LOADING
                        ========================================= */

                        if (submitButton) {

                            submitButton.disabled = true;

                            submitButton.innerHTML =
                                '<i class="fa-solid fa-spinner fa-spin"></i> Sending...';

                        }


                        try {

                            const formData =
                                new FormData(
                                    rentalRequirementsForm
                                );


                            const response =
                                await fetch(
                                    rentalRequirementsForm.action,
                                    {
                                        method: "POST",

                                        body: formData,

                                        headers: {
                                            "Accept":
                                                "application/json",

                                            "X-Requested-With":
                                                "XMLHttpRequest"
                                        }
                                    }
                                );


                            let result;


                            try {

                                result =
                                    await response.json();

                            } catch (jsonError) {

                                throw new Error(
                                    "Invalid server response."
                                );

                            }


                            /* =========================================
                               VALIDATION / SERVER ERROR
                            ========================================= */

                            if (!response.ok) {

                                if (result.errors) {

                                    const firstError =
                                        Object.values(
                                            result.errors
                                        ).flat()[0];


                                    Swal.fire({
                                        icon: "error",
                                        title: "Submission Failed",
                                        text:
                                            firstError ||
                                            "Please check the form and try again.",
                                        confirmButtonText: "OK",
                                        confirmButtonColor: "#071b3d"
                                    });

                                } else {

                                    Swal.fire({
                                        icon: "error",
                                        title: "Submission Failed",
                                        text:
                                            result.message ||
                                            "Unable to submit your enquiry. Please try again.",
                                        confirmButtonText: "OK",
                                        confirmButtonColor: "#071b3d"
                                    });

                                }

                                return;
                            }


                            /* =========================================
                               SUCCESS
                            ========================================= */

                            if (result.success) {

                                rentalRequirementsForm.reset();

                                if (
                                    typeof window.closeEnquiry ===
                                    "function"
                                ) {
                                    window.closeEnquiry();
                                }


                                Swal.fire({
                                    icon: "success",
                                    title: "Enquiry Submitted!",
                                    text:
                                        result.message ||
                                        "Your rental enquiry has been submitted successfully. Our property expert will contact you shortly.",
                                    confirmButtonText: "OK",
                                    confirmButtonColor: "#071b3d",
                                    allowOutsideClick: false,
                                    allowEscapeKey: true
                                });

                            } else {

                                Swal.fire({
                                    icon: "error",
                                    title: "Submission Failed",
                                    text:
                                        result.message ||
                                        "Unable to submit your enquiry. Please try again.",
                                    confirmButtonText: "OK",
                                    confirmButtonColor: "#071b3d"
                                });

                            }


                        } catch (error) {

                            console.error(
                                "Rental enquiry submission error:",
                                error
                            );


                            Swal.fire({
                                icon: "error",
                                title: "Something Went Wrong",
                                text:
                                    "Unable to submit your enquiry. Please try again.",
                                confirmButtonText: "OK",
                                confirmButtonColor: "#071b3d"
                            });


                        } finally {

                            if (submitButton) {

                                submitButton.disabled = false;

                                submitButton.innerHTML =
                                    originalButtonText;

                            }

                        }

                    }
                );

            }



            /* =====================================================
               OVERLAY
            ===================================================== */

            document
                .querySelectorAll(
                    ".property-modal-overlay"
                )
                .forEach(function (overlay) {

                    overlay.addEventListener(
                        "click",
                        function () {

                            const modal =
                                overlay.closest(
                                    ".property-modal"
                                );


                            if (!modal) return;


                            modal.classList.remove(
                                "active"
                            );


                            modal.setAttribute(
                                "aria-hidden",
                                "true"
                            );


                            unlockPage();

                        }
                    );

                });



            /* =====================================================
               MODAL BOX CLICK
               Prevent overlay close
            ===================================================== */

            document
                .querySelectorAll(
                    ".property-modal-box"
                )
                .forEach(function (box) {

                    box.addEventListener(
                        "click",
                        function (event) {

                            event.stopPropagation();

                        }
                    );

                });



            /* =====================================================
               ESCAPE KEY
            ===================================================== */

            document.addEventListener(
                "keydown",
                function (event) {

                    if (event.key !== "Escape") {
                        return;
                    }


                    const enquiryModal =
                        document.getElementById(
                            "enquiryModal"
                        );


                    const visitModal =
                        document.getElementById(
                            "visitModal"
                        );


                    if (
                        enquiryModal &&
                        enquiryModal.classList.contains(
                            "active"
                        )
                    ) {

                        window.closeEnquiry();

                    }


                    if (
                        visitModal &&
                        visitModal.classList.contains(
                            "active"
                        )
                    ) {

                        window.closeVisit();

                    }


                    if (toast) {

                        toast.classList.remove(
                            "show"
                        );

                    }

                }
            );



            /* =====================================================
               SIMILAR PROPERTIES
            ===================================================== */

            window.scrollSimilar = function (direction) {

                const list =
                    document.getElementById(
                        "similarList"
                    );


                if (!list) return;


                const amount =
                    Math.max(
                        260,
                        list.clientWidth * 0.75
                    );


                list.scrollBy({

                    left: direction * amount,

                    behavior: "smooth"

                });

            };


        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const reportModal = document.getElementById("reportModal");
            const reportForm = document.getElementById("reportPropertyForm");

            /*
             * OPEN REPORT MODAL
             */
            window.openReportModal = function () {

                if (!reportModal) return;

                reportModal.classList.add("active");
                reportModal.setAttribute("aria-hidden", "false");

                document.body.classList.add("report-modal-open");

                setTimeout(function () {

                    const reason = document.getElementById("reportReason");

                    if (reason) {
                        reason.focus();
                    }

                }, 250);
            };


            /*
             * CLOSE REPORT MODAL
             */
            window.closeReportModal = function () {

                if (!reportModal) return;

                reportModal.classList.remove("active");
                reportModal.setAttribute("aria-hidden", "true");

                document.body.classList.remove("report-modal-open");
            };


            /*
             * CLOSE WHEN CLICKING OUTSIDE
             */
            if (reportModal) {

                reportModal.addEventListener("click", function (event) {

                    if (event.target.classList.contains("report-overlay")) {
                        window.closeReportModal();
                    }

                });

            }


            /*
             * SUBMIT REPORT
             *
             * Current version:
             * Shows confirmation only.
             *
             * Replace the showToast section later with your
             * Laravel/API request when the backend endpoint is ready.
             */
            if (reportForm) {

                reportForm.addEventListener("submit", function (event) {

                    event.preventDefault();

                    const reason =
                        document.getElementById("reportReason");

                    const message =
                        document.getElementById("reportMessage");

                    if (!reason || !reason.value) {

                        if (typeof window.showToast === "function") {
                            window.showToast("Please select a reason");
                        }

                        return;
                    }


                    /*
                     * Get selected values
                     */
                    const selectedReason =
                        reason.options[reason.selectedIndex].text;

                    const additionalMessage =
                        message ? message.value.trim() : "";


                    /*
                     * Temporary frontend confirmation.
                     *
                     * This does NOT save to the database yet.
                     */
                    console.log("Property Report:", {
                        reason: selectedReason,
                        message: additionalMessage
                    });


                    window.closeReportModal();


                    if (typeof window.showToast === "function") {

                        window.showToast(
                            "Report submitted successfully"
                        );

                    }


                    /*
                     * Reset after submission
                     */
                    setTimeout(function () {

                        reportForm.reset();

                    }, 300);

                });

            }


            /*
             * ESC KEY
             */
            document.addEventListener("keydown", function (event) {

                if (event.key === "Escape") {

                    if (
                        reportModal &&
                        reportModal.classList.contains("active")
                    ) {
                        window.closeReportModal();
                    }

                }

            });

        });
    </script>

@endsection