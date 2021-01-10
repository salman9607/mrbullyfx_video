<link rel="stylesheet" href="{{ asset('public/css/style.css') }}" />
<script src="https://js.stripe.com/v3/"></script>

<style>
  * {
          font-family: 'Helvetica Neue', Helvetica, sans-serif;
          font-size: 19px;
          font-variant: normal;
          padding: 0;
          margin: 0;
        }
        
        html {
          height: 100%;
        }
        
        body {
          background: #424770;
          display: flex;
          align-items: center;
          min-height: 100%;
        }
        
        form {
          width: 480px;
          margin: 20px auto;
        }
        
        label {
          height: 35px;
          position: relative;
          color: #8798AB;
          display: block;
          margin-top: 30px;
          margin-bottom: 20px;
        }
        
        label > span {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          font-weight: 300;
          line-height: 32px;
          color: #8798AB;
          border-bottom: 1px solid #586A82;
          transition: border-bottom-color 200ms ease-in-out;
          cursor: text;
          pointer-events: none;
        }
        
        label > span span {
          position: absolute;
          top: 0;
          left: 0;
          transform-origin: 0% 50%;
          transition: transform 200ms ease-in-out;
          cursor: text;
        }
        
        label .field.is-focused + span span,
        label .field:not(.is-empty) + span span {
          transform: scale(0.68) translateY(-36px);
          cursor: default;
        }
        
        label .field.is-focused + span {
          border-bottom-color: #34D08C;
        }
        
        .field {
          background: transparent;
          font-weight: 300;
          border: 0;
          color: white;
          outline: none;
          cursor: text;
          display: block;
          width: 100%;
          line-height: 32px;
          padding-bottom: 3px;
          transition: opacity 200ms ease-in-out;
        }
        
        .field::-webkit-input-placeholder { color: #8898AA; }
        .field::-moz-placeholder { color: #8898AA; }
        
        /* IE doesn't show placeholders when empty+focused */
         .field:-ms-input-placeholder { color: #424770; }
        
        .field.is-empty:not(.is-focused) {
          opacity: 0;
        }
        
        button {
          float: left;
          display: block;
          background: #34D08C;
          color: white;
          border-radius: 2px;
          border: 0;
          margin-top: 20px;
          font-size: 19px;
          font-weight: 400;
          width: 100%;
          height: 47px;
          line-height: 45px;
          outline: none;
        }
        
        button:focus {
          background: #24B47E;
        }
        
        button:active {
          background: #159570;
        }
        
        .outcome {
          float: left;
          width: 100%;
          padding-top: 8px;
          min-height: 20px;
          text-align: center;
        }
        
        .success, .error {
          display: none;
          font-size: 15px;
        }
        
        .success.visible, .error.visible {
          display: inline;
        }
        
        .error {
          color: #E4584C;
        }
        
        .success {
          color: #34D08C;
        }
        
        .success .token {
          font-weight: 500;
          font-size: 15px;
        }
</style>

<form action="{{ url('charge') }}" method="post" id="payment-form">
    <div class="form-row">
        
        <label for="card-element">
        Credit or debit card
        </label>
        <div id="card-element">
        <!-- A Stripe Element will be inserted here. -->
        </div>
     
        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
    </div>
    <button>Submit Payment</button>
    {{ csrf_field() }}
</form>
<script>
var publishable_key = '{{ env('STRIPE_PUBLISHABLE_KEY') }}';
</script>
<script src="{{ asset('public/js/card.js') }}"></script>