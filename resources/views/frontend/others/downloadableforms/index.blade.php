@extends('layouts.frontend')

@section('content')

<style>
    h1{
        font-family: Helvetica;
    }
    p{
        color: white;
    }

</style>

<div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 style="color: green;">Downloadable Forms</h1>
                </div>
            </div>

            <div id="accordion" class="pt-5 r">
                                                    <div class="card mb-3 bg-info bg-info">
                        <div class="card-header collapsed" id="heading1" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                            <h4 class="mb-0">Office of the Building Official (OBO)</h4>
                        </div>

                        <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordion" style="">
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <ul>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2023/01/19/63c9078414ce41674119044checklist of requirements for building permit and occupancy (fit-out).pdf" target="_blank" class="download" data-uuid="38d9bc25-97d8-11ed-bf5b-728499e62c7c">
                                                    <p>CHECKLIST OF REQUIREMENTS FOR BUILDING PERMIT (FIT-OUT WITHIN A MALL OR COMMERCIAL BUILDING WITH PREVIOUSLY ISSUED OCCUPANCY PERMIT) <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2023/01/19/63c907c4610331674119108checklist of requirements for building permit and occupancy (new construction).pdf" target="_blank" class="download" data-uuid="5f2f28a2-97d8-11ed-bf5b-728499e62c7c">
                                                    <p>CHECKLIST OF REQUIREMENTS FOR BUILDING PERMIT (FOR NEW CONSTRUCTION OF BUILDING / STRUCTURE) <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2023/01/19/63c90811307181674119185checklist of requirements for building permit and occupancy (repair and ammendment).pdf" target="_blank" class="download" data-uuid="8cf5eed4-97d8-11ed-bf5b-728499e62c7c">
                                                    <p>CHECKLIST OF REQUIREMENTS FOR BUILDING PERMIT (REPAIR / AMENDMENT) <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2023/01/19/63c9083c6349b1674119228checklist of requirements for demolition permit 2.pdf" target="_blank" class="download" data-uuid="a6b6ff0f-97d8-11ed-bf5b-728499e62c7c">
                                                    <p>LIST OF REQUIREMENTS FOR DEMOLITION PERMIT <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2023/01/19/63c9085785b8b1674119255LIST OF REQUIREMENTS FOR MECHANICAL PERMIT TO INSTALL OF GONDOLA, CONSTRUCTION ELEVATOR.pdf" target="_blank" class="download" data-uuid="b6e45f9c-97d8-11ed-bf5b-728499e62c7c">
                                                    <p>CHECKLIST OF REQUIREMENTS FOR MECHANICAL PERMIT TO  INSTALL AND PERMIT TO OPERATE OF GONDOLA, CONSTRUCTION ELEVATOR <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2023/01/19/63c9087670b041674119286LIST OF REQUIREMENTS FOR MECHANICAL PERMIT TO INSTALL OF TOWER CRANE.pdf" target="_blank" class="download" data-uuid="c9516328-97d8-11ed-bf5b-728499e62c7c">
                                                    <p>CHECKLIST OF REQUIREMENTS FOR MECHANICAL PERMIT TO  INSTALL AND PERMIT TO OPERATE OF TOWER CRANE, PLACING BOOM, HOIST <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2023/01/19/63c908a965c371674119337Requirements for PTI and PTO.pdf" target="_blank" class="download" data-uuid="e7b0b256-97d8-11ed-bf5b-728499e62c7c">
                                                    <p>CHECKLIST OF REQUIREMENTS FOR MECHANICAL PERMIT TO  INSTALL AND PERMIT TO OPERATE OF MECHANICAL EQUIPMENT <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></i></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/10/07/633fc077b46c31665122423632bfab601c131663826614Unified Application Form for  Certificate of Occupancy.pdf" target="_blank" class="download" data-uuid="55403ff5-4605-11ed-bf5b-728499e62c7c">
                                                    <p>UNIFIED APPLICATION FORM FOR CERTIFICATE OF OCCUPANCY <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/09/22/632bf93ad1ef71663826234BUILDING PERMIT UNIFIED .pdf" target="_blank" class="download" data-uuid="68795f8f-3a3b-11ed-bf5b-728499e62c7c">
                                                    <p>BUILDING PERMIT UNIFIED <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/09/22/632bf946bc4891663826246CIVIL STRUCTURAL PERMIT .pdf" target="_blank" class="download" data-uuid="6f92d1e0-3a3b-11ed-bf5b-728499e62c7c">
                                                    <p>CIVIL STRUCTURAL PERMIT <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/09/22/632bf9560b4431663826262DEMOLITION PERMIT.pdf" target="_blank" class="download" data-uuid="78ad9668-3a3b-11ed-bf5b-728499e62c7c">
                                                    <p>DEMOLITION PERMIT <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/09/22/632bf967802ba1663826279ELECTRONIC COMPLETION .pdf" target="_blank" class="download" data-uuid="8318a2c4-3a3b-11ed-bf5b-728499e62c7c">
                                                    <p>ELECTRICAL COMPLETION <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/09/22/632bf9a868b391663826344ELECTRICAL PERMIT .pdf" target="_blank" class="download" data-uuid="a9c83286-3a3b-11ed-bf5b-728499e62c7c">
                                                    <p>ELECTRICAL PERMIT <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/09/22/632bf9b4b5c281663826356ELECTRONIC COMPLETION .pdf" target="_blank" class="download" data-uuid="b11f645e-3a3b-11ed-bf5b-728499e62c7c">
                                                    <p>ELECTRONIC COMPLETION <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/09/22/632bf9c0e88471663826368ELECTRONICS PERMIT .pdf" target="_blank" class="download" data-uuid="b8662ed2-3a3b-11ed-bf5b-728499e62c7c">
                                                    <p>ELECTRONICS PERMIT <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/09/22/632bfa62d897b1663826530EXCAVATION AND GROUND PREPARATION PERMIT .pdf" target="_blank" class="download" data-uuid="18eb7a1d-3a3c-11ed-bf5b-728499e62c7c">
                                                    <p>EXCAVATION AND GROUND PREPARATION PERMIT <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/09/22/632bfa70654421663826544FENCING PERMIT.pdf" target="_blank" class="download" data-uuid="20fb9fc3-3a3c-11ed-bf5b-728499e62c7c">
                                                    <p>FENCING PERMIT <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/09/22/632bfa7ca118d1663826556MECHANICAL COMPLETION .pdf" target="_blank" class="download" data-uuid="28480fb8-3a3c-11ed-bf5b-728499e62c7c">
                                                    <p>MECHANICAL COMPLETION <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/09/22/632bfa89977b01663826569MECHANICAL PERMIT .pdf" target="_blank" class="download" data-uuid="3001b40d-3a3c-11ed-bf5b-728499e62c7c">
                                                    <p>MECHANICAL PERMIT <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/09/22/632bfa96b1a6f1663826582SANITARY PERMIT.pdf" target="_blank" class="download" data-uuid="37d1b16b-3a3c-11ed-bf5b-728499e62c7c">
                                                    <p>SANITARY PERMIT <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/09/22/632bfaa6950191663826598SIGN PERMIT .pdf" target="_blank" class="download" data-uuid="414933c7-3a3c-11ed-bf5b-728499e62c7c">
                                                    <p>SIGN PERMIT <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                            </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                                                        <div class="card mb-3 bg-info">
                        <div class="card-header collapsed" id="heading2" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            <h4 class="mb-0">Business Permits and Licensing Department</h4>
                        </div>

                        <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion" style="">
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <ul>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2023/01/05/63b6373ee2d7116728860782022 LIST OF REQUIREMENTS (2).pdf" target="_blank" class="download" data-uuid="805951bc-8ca1-11ed-bf5b-728499e62c7c">
                                                    <p>2023 LIST OF REQUIREMENTS <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2023/01/04/63b5385058c831672820816FILLABLE UNIFIED BUSINESS APPLICATION FORM (3x copies) (Long 8.5 x 13) (2).pdf" target="_blank" class="download" data-uuid="8cd4136d-8c09-11ed-bf5b-728499e62c7c">
                                                    <p>FILLABLE UNIFIED BUSINESS APPLICATION FORM (3x copies) (Long 8.5 x 13) <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/10/06/633e35ff578d51665021439632c0a7cc709b1663830652OCCAPPFORM.pdf" target="_blank" class="download" data-uuid="35df09f4-451a-11ed-bf5b-728499e62c7c">
                                                    <p>OCCUPATIONAL PERMIT APPLICATION FORM <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                            </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                                                        <div class="card mb-3 bg-info">
                        <div class="card-header collapsed" id="heading3" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            <h4 class="mb-0">City Planning and Development Office</h4>
                        </div>

                        <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion" style="">
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <ul>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/11/17/6375c476a0ec81668662390LC FORM SOFT COPY 2021 - NEW.pdf" target="_blank" class="download" data-uuid="75f585f6-6637-11ed-bf5b-728499e62c7c">
                                                    <p>APPLICATION FOR LOCATIONAL CLEARANCE <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/11/17/6375c4987fd371668662424NEW COC FORM 2022.pdf" target="_blank" class="download" data-uuid="8a24ef92-6637-11ed-bf5b-728499e62c7c">
                                                    <p>APPLICATION FOR CERTIFICATE OF CONFORMANCE <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/11/17/6375ce26197c21668664870LC REQUIREMENTS 2021 NEW edited.pdf" target="_blank" class="download" data-uuid="3bd2e60b-663d-11ed-bf5b-728499e62c7c">
                                                    <p>REQUIREMENTS FOR LOCATIONAL CLEARANCE APPLICATION <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                            </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                                                        <div class="card mb-3 bg-info">
                        <div class="card-header collapsed" id="heading4" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                            <h4 class="mb-0">Civil Society Organization (CSO)</h4>
                        </div>

                        <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion" style="">
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <ul>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/10/07/633fbc2230af61665121314632bf8f22b6841663826162Name of Organization2019715_182545.pdf" target="_blank" class="download" data-uuid="bfea04f2-4602-11ed-bf5b-728499e62c7c">
                                                    <p>PARTICIPANTS PROFILE FORM <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/09/22/632bf8b8108d21663826104CSO ACCREDITATION FORM.pdf" target="_blank" class="download" data-uuid="1a8402a0-3a3b-11ed-bf5b-728499e62c7c">
                                                    <p>CSO ACCREDITATION FORM <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/09/22/632bf8e2a90041663826146CSO LETTER FOR APPLICATION.pdf" target="_blank" class="download" data-uuid="33ec0208-3a3b-11ed-bf5b-728499e62c7c">
                                                    <p>CSO LETTER FOR APPLICATION <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/09/22/632bf8ffc657d1663826175PARTICIPANTS PROFILE FORM.pdf" target="_blank" class="download" data-uuid="4547577d-3a3b-11ed-bf5b-728499e62c7c">
                                                    <p>PARTICIPANTS PROFILE FORM <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                            </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                                                        <div class="card mb-3 bg-info">
                        <div class="card-header collapsed" id="heading5" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                            <h4 class="mb-0">City Health Department ( CHD)</h4>
                        </div>

                        <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion" style="">
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <ul>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/10/07/633fbf46131b01665122118633be14abbdc51664868682Interview-Form-for-Out-Patient-DDE new-converted2020930_182521.pdf" target="_blank" class="download" data-uuid="9f1016ea-4604-11ed-bf5b-728499e62c7c">
                                                    <p>DRUG DEPENDENCY EXAMINATION INTERVIEW SHEET (DDEIS) <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/10/04/633be0f06ba0d1664868592DRUG TEST FORM updated-converted202034_0192.pdf" target="_blank" class="download" data-uuid="5601f67f-43b6-11ed-bf5b-728499e62c7c">
                                                    <p>DRUG TEST FORM <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/10/04/633be1196015e1664868633MOA (MEMORANDUM OF AGREMENT)-converted202034_01929.pdf" target="_blank" class="download" data-uuid="6e6ac404-43b6-11ed-bf5b-728499e62c7c">
                                                    <p>MOA (MEMORANDUM OF AGREMENT) <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/10/04/633be13014c561664868656ONE STOP SHOP REQUEST FORM-converted202034_01949.pdf" target="_blank" class="download" data-uuid="7bf12faf-43b6-11ed-bf5b-728499e62c7c">
                                                    <p>ONE STOP SHOP REQUEST FORM <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/10/04/633be162b0b8a1664868706CLIENTS-DATA-FORMS-HIV2021723_12529.pdf" target="_blank" class="download" data-uuid="9a201319-43b6-11ed-bf5b-728499e62c7c">
                                                    <p>CLIENTS DATA FORMS (HIV) <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                            </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                                                        <div class="card mb-3 bg-info">
                        <div class="card-header collapsed" id="heading6" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                            <h4 class="mb-0">Local Civil Registry (LCR)</h4>
                        </div>

                        <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordion" style="">
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <ul>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/10/07/633fbf87682e91665122183632bf917311f91663826199REQUIREMENTS FOR MARRIAGE LICENSE APPLICATION-converted2020105_224942.pdf" target="_blank" class="download" data-uuid="c6038303-4604-11ed-bf5b-728499e62c7c">
                                                    <p>REQUIREMENTS FOR MARRIAGE LICENSE APPLICATION <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                            </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                                                        <div class="card mb-3 bg-info">
                        <div class="card-header collapsed" id="heading7" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                            <h4 class="mb-0">Revenue Code</h4>
                        </div>

                        <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion" style="">
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <ul>
                                                                                    <li><a href="https://assets.pasigcity.gov.ph/storage/downloadables/2022/10/07/633fc0e8d82941665122536632bfacec71cf16638266382017 Revised Pasig Revenue Code.pdf" target="_blank" class="download" data-uuid="98b2877a-4605-11ed-bf5b-728499e62c7c">
                                                    <p>2017 REVISED PASIG REVENUE CODE <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
</svg></p>
                                                </a></li>
                                                                            </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                                                </div>


        </div>

    <!-- @if(isset($downloadableforms->title))
        <h1 style="text-align: center;">
            <span style="color: #046631;">{{$downloadableforms->title}}</span>
        </h1><br><br>
        <div class="siteorigin-widget-tinymce textwidget">
            {!! $downloadableforms->description !!}
        </div>
    @endif -->
</div>
@endsection