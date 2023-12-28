@extends('layouts.admin')

@section('title') 
    Frequestly Asked Questions
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">FAQs</h1>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Frequestly Asked Questions</h6>
            </div>
            <div class="card-body">
                <div class="accordion" id="accordionsimplefill">
                    <div class="mb-2 acd-group">
                        <div class="card-header bg-info rounded-0">
                            <h6 class="mb-0">
                                <a href="#collapse" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse" aria-expanded="false">1. How do I register new consultants under me?</a>
                            </h6>
                        </div>
                        <div id="collapse" class="collapse" data-parent="#accordionsimplefill">
                            <div class="card-body">
                                <p>Copy your invitation link from your profile page and send to the every body you want to register.
                                    Your invitation link should look like this <u>{{ url('/sign-up/0-11111111') }}</u> 
                                    and your should be able access it on the referral code.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 acd-group">
                        <div class="card-header rounded-0 bg-info">
                            <h6 class="mb-0">
                                <a href="#collapse2" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">2. How do I see my downlines?</a>
                            </h6>
                        </div>
                        <div id="collapse2" class="collapse" data-parent="#accordionsimplefill">
                            <div class="card-body">
                                <p>Click on the "My Referrals" link on the left navigation menu.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 acd-group">
                        <div class="card-header rounded-0 bg-info">
                            <h6 class="mb-0">
                                <a href="#collapse3" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">3. How do I edit my profile details ?</a>
                            </h6>
                        </div>
                        <div id="collapse3" class="collapse" data-parent="#accordionsimplefill">
                            <div class="card-body">
                                <p>Click on "My Profile" on the left navigation menu, then click on "Edit Profile" button at the top 
                                    right corner of your Profile page.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 acd-group">
                        <div class="card-header rounded-0 bg-info">
                            <h6 class="mb-0">
                                <a href="#collapse4" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">4. How do I see transactions / sales by me ?</a>
                            </h6>
                        </div>
                        <div id="collapse4" class="collapse" data-parent="#accordionsimplefill">
                            <div class="card-body">
                                <p>Click on "My Sales" on the left navigation menu, all the properties you've sold is displayed there.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 acd-group">
                        <div class="card-header rounded-0 bg-info">
                            <h6 class="mb-0">
                                <a href="#collapse5" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">5. I have other complaints, what do I do?</a>
                            </h6>
                        </div>
                        <div id="collapse5" class="collapse" data-parent="#accordionsimplefill">
                            <div class="card-body">
                                <p>Send an email to <a href="mailto:info@dealclinchersltd.com">info@dealclinchersltd.com</a>, the email should
                                    be sent with your registered email and should include your referral code and registered phone number which 
                                    is available on your profile page.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
