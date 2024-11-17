<div class="callout">
    <h5>Enter your email address to receive a login link.</h5>
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="medium-8 cell">
                    @error('email')
                        <div style="color: red;">
                            {{ $message }}
                        </div>
                    @enderror
                <form method="POST" action="{{ route('attempt') }}">
                    @csrf
                    <label>&nbsp;
                        <input name="email" type="text" placeholder="E-Mail Address" value="samueljwerner@gmail.com">
                        <div style="display:none"><input type="text" name="weetard"></div>
                    </label>
                    <input type="submit" value="Log In" class="btn"></input>
                </form>
            </div>
        </div>
    </div>
</div>