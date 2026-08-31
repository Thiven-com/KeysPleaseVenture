@extends('layouts.website')

@section('content')

<style>
/* =========================================================
   PROPERTY DETAIL PAGE
   RESPONSIVE: DESKTOP / LAPTOP / TABLET / MOBILE
   PRIMARY COLOR: #1724c9
========================================================= */

:root {
    --blue: #1724c9;
    --blue-dark: #111ca5;
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

.location > span {
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

    background: linear-gradient(
        135deg,
        #1723c900,
        #1019a7
    );

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

            <button
                type="button"
                class="fav"
                onclick="toggleFavourite(this)"
                aria-label="Add property to favourites"
            >
                <i class="fa-regular fa-heart"></i>
            </button>

            <img
                class="hero"
                src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=1400&q=90"
                alt="Living room"
            >

            <img
                src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=700&q=85"
                alt="Kitchen"
            >

            <img
                src="https://images.unsplash.com/photo-1600607688969-a5bfcd646154?auto=format&fit=crop&w=700&q=85"
                alt="Bedroom"
            >

            <div class="thumb-more">
                <img
                    src="https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?auto=format&fit=crop&w=700&q=85"
                    alt="Interior"
                >
            </div>

            <div class="photo-count">
                <i class="fa-regular fa-images"></i>
                &nbsp;14 Photos
            </div>

            <div class="more-count">
                +10
            </div>

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

                    <button
                        type="button"
                        class="small-action"
                        onclick="shareProperty()"
                    >
                        <i class="fa-solid fa-share-nodes"></i>
                        &nbsp; Share
                    </button>

                    <button
                        type="button"
                        class="small-action"
                        onclick="showToast('Property reported')"
                    >
                        <i class="fa-solid fa-flag"></i>
                        &nbsp; Report
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

                <button
                    type="button"
                    class="map-btn"
                    onclick="openMap()"
                >
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

                            <button
                                type="button"
                                class="slider-btn"
                                onclick="scrollSimilar(-1)"
                                aria-label="Previous properties"
                            >
                                <i class="fa-solid fa-chevron-left"></i>
                            </button>

                            <button
                                type="button"
                                class="slider-btn"
                                onclick="scrollSimilar(1)"
                                aria-label="Next properties"
                            >
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>

                        </div>

                    </div>


                    <div
                        class="similar-list"
                        id="similarList"
                    >

                        <div
                            class="property-card"
                            onclick="location.href='property_details.html#property2'"
                        >

                            <img
                                src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=700&q=85"
                                alt="2.5 BHK Apartment"
                            >

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


                        <div
                            class="property-card"
                            onclick="location.href='property_details.html#property3'"
                        >

                            <img
                                src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=700&q=85"
                                alt="3 BHK Apartment"
                            >

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


                        <div
                            class="property-card"
                            onclick="location.href='{{ route('rent') }}'"
                        >

                            <img
                                src="https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?auto=format&fit=crop&w=700&q=85"
                                alt="2 BHK Apartment"
                            >

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


                        <div
                            class="property-card"
                            onclick="location.href='{{ route('rent') }}'"
                        >

                            <img
                                src="https://images.unsplash.com/photo-1600210491892-03d54c0aaf87?auto=format&fit=crop&w=700&q=85"
                                alt="3 BHK Apartment"
                            >

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

            <button
                type="button"
                class="primary-btn"
                onclick="openEnquiry()"
            >
                Enquire Now
            </button>

            <button
                type="button"
                class="secondary-btn"
                onclick="scheduleVisit()"
            >
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
                        <i
                            class="fa-solid fa-circle-check"
                            style="color:#1264d8"
                        ></i>
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

            <button
                type="button"
                class="all-properties"
                onclick="location.href='{{ route('rent') }}'"
            >
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

            <button
                type="button"
                class="map-link"
                onclick="openMap()"
            >
                View on Map
                <i class="fa-solid fa-location-dot"></i>
            </button>

        </div>

    </aside>

</div>


<!-- =========================================================
     ENQUIRY MODAL
========================================================= -->

<div
    class="property-modal"
    id="enquiryModal"
    aria-hidden="true"
>

    <div
        class="property-modal-overlay"
        onclick="closeEnquiry()"
    ></div>


    <div
        class="property-modal-box"
        role="dialog"
        aria-modal="true"
        aria-labelledby="enquiryModalTitle"
    >

        <button
            type="button"
            class="property-modal-close"
            onclick="closeEnquiry()"
            aria-label="Close enquiry form"
        >
            <i class="fa-solid fa-xmark"></i>
        </button>


        <div class="property-modal-header">

            <div class="property-modal-icon">
                <i class="fa-solid fa-house"></i>
            </div>

            <div>

                <span>
                    PROPERTY ENQUIRY
                </span>

                <h2 id="enquiryModalTitle">
                    Enquire About This Property
                </h2>

                <p>
                    Share your details and our property expert
                    will contact you shortly.
                </p>

            </div>

        </div>


        <form
            action="#"
            method="POST"
            class="property-modal-form"
        >

            @csrf

            <div class="modal-form-row">

                <div class="modal-form-group">

                    <label for="enquiry_name">
                        Full Name
                    </label>

                    <input
                        type="text"
                        id="enquiry_name"
                        name="name"
                        placeholder="Enter your full name"
                        required
                    >

                </div>


                <div class="modal-form-group">

                    <label for="enquiry_phone">
                        Phone Number
                    </label>

                    <input
                        type="tel"
                        id="enquiry_phone"
                        name="phone"
                        placeholder="Enter your phone number"
                        required
                    >

                </div>

            </div>


            <div class="modal-form-group">

                <label for="enquiry_email">
                    Email Address
                </label>

                <input
                    type="email"
                    id="enquiry_email"
                    name="email"
                    placeholder="Enter your email address"
                >

            </div>


            <div class="modal-form-row">

                <div class="modal-form-group">

                    <label for="enquiry_property">
                        Property Type
                    </label>

                    <select
                        id="enquiry_property"
                        name="property_type"
                        required
                    >

                        <option value="">
                            Select property type
                        </option>

                        <option value="apartment">
                            Apartment
                        </option>

                        <option value="villa">
                            Villa
                        </option>

                        <option value="plot">
                            Plot
                        </option>

                        <option value="commercial">
                            Commercial
                        </option>

                    </select>

                </div>


                <div class="modal-form-group">

                    <label for="enquiry_budget">
                        Budget
                    </label>

                    <select
                        id="enquiry_budget"
                        name="budget"
                    >

                        <option value="">
                            Select your budget
                        </option>

                        <option value="below-25">
                            Below ₹25 Lakhs
                        </option>

                        <option value="25-50">
                            ₹25 – ₹50 Lakhs
                        </option>

                        <option value="50-75">
                            ₹50 – ₹75 Lakhs
                        </option>

                        <option value="75-1cr">
                            ₹75 Lakhs – ₹1 Crore
                        </option>

                        <option value="above-1cr">
                            Above ₹1 Crore
                        </option>

                    </select>

                </div>

            </div>


            <div class="modal-form-group">

                <label for="enquiry_message">
                    Message
                </label>

                <textarea
                    id="enquiry_message"
                    name="message"
                    rows="4"
                    placeholder="Tell us what you are looking for..."
                ></textarea>

            </div>


            <button
                type="submit"
                class="modal-submit-btn"
            >
                <i class="fa-solid fa-paper-plane"></i>
                Send Enquiry
            </button>

        </form>

    </div>

</div>


<!-- =========================================================
     SCHEDULE VISIT MODAL
========================================================= -->

<div
    class="property-modal"
    id="visitModal"
    aria-hidden="true"
>

    <div
        class="property-modal-overlay"
        onclick="closeVisit()"
    ></div>


    <div
        class="property-modal-box"
        role="dialog"
        aria-modal="true"
        aria-labelledby="visitModalTitle"
    >

        <button
            type="button"
            class="property-modal-close"
            onclick="closeVisit()"
            aria-label="Close schedule visit form"
        >
            <i class="fa-solid fa-xmark"></i>
        </button>


        <div class="property-modal-header">

            <div class="property-modal-icon">
                <i class="fa-regular fa-calendar-check"></i>
            </div>

            <div>

                <span>
                    SCHEDULE A VISIT
                </span>

                <h2 id="visitModalTitle">
                    Schedule a Property Visit
                </h2>

                <p>
                    Choose your preferred date and time
                    to visit this property.
                </p>

            </div>

        </div>


        <form
            action="#"
            method="POST"
            class="property-modal-form"
        >

            @csrf

            <div class="modal-form-row">

                <div class="modal-form-group">

                    <label for="visit_name">
                        Full Name
                    </label>

                    <input
                        type="text"
                        id="visit_name"
                        name="name"
                        placeholder="Enter your full name"
                        required
                    >

                </div>


                <div class="modal-form-group">

                    <label for="visit_phone">
                        Phone Number
                    </label>

                    <input
                        type="tel"
                        id="visit_phone"
                        name="phone"
                        placeholder="Enter your phone number"
                        required
                    >

                </div>

            </div>


            <div class="modal-form-row">

                <div class="modal-form-group">

                    <label for="visit_date">
                        Preferred Date
                    </label>

                    <input
                        type="date"
                        id="visit_date"
                        name="visit_date"
                        required
                    >

                </div>


                <div class="modal-form-group">

                    <label for="visit_time">
                        Preferred Time
                    </label>

                    <select
                        id="visit_time"
                        name="visit_time"
                        required
                    >

                        <option value="">
                            Select time
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


            <div class="modal-form-group">

                <label for="visit_property">
                    Property
                </label>

                <select
                    id="visit_property"
                    name="property"
                    required
                >

                    <option value="">
                        Select property
                    </option>

                    <option value="luxury-villa">
                        Luxury Villa
                    </option>

                    <option value="premium-apartment">
                        Premium Apartment
                    </option>

                    <option value="residential-plot">
                        Residential Plot
                    </option>

                    <option value="commercial-property">
                        Commercial Property
                    </option>

                </select>

            </div>


            <div class="modal-form-group">

                <label for="visit_message">
                    Additional Requirements
                </label>

                <textarea
                    id="visit_message"
                    name="message"
                    rows="3"
                    placeholder="Any specific requirements..."
                ></textarea>

            </div>


            <button
                type="submit"
                class="modal-submit-btn"
            >
                <i class="fa-regular fa-calendar-check"></i>
                Schedule Visit
            </button>

        </form>

    </div>

</div>


<!-- =========================================================
     SCRIPT
========================================================= -->

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

            showToast("Removed from favourites");

        } else {

            icon.classList.remove("fa-regular");
            icon.classList.add("fa-solid");

            button.style.color = "#e52d5f";

            showToast("Added to favourites");

        }

        if (button.animate) {

            button.animate(
                [
                    { transform: "scale(1)" },
                    { transform: "scale(1.15)" },
                    { transform: "scale(1)" }
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

                showToast("Property link copied");

            } else {

                showToast("Unable to copy property link");

            }

        } catch (error) {

            showToast("Unable to copy property link");

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
                input.focus({ preventScroll: true });
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
                input.focus({ preventScroll: true });
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
       OVERLAY
    ===================================================== */

    document
        .querySelectorAll(".property-modal-overlay")
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
        .querySelectorAll(".property-modal-box")
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
                document.getElementById("enquiryModal");

            const visitModal =
                document.getElementById("visitModal");

            if (
                enquiryModal &&
                enquiryModal.classList.contains("active")
            ) {
                window.closeEnquiry();
            }

            if (
                visitModal &&
                visitModal.classList.contains("active")
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

@endsection