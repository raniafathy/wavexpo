
Hey {{$name}}, Welcome to Wavexpo! <br/><br/>
 <br/><br/><br/>

<h2>Verify Your Email Address</h2>

        <div>
            Thanks for creating an account with the verification demo app.
            Please follow the link below to verify your email address
            {{ URL::to('register/verify/' . $confirmation_code) }}.<br/>

        </div>