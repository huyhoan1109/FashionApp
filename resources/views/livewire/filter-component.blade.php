<form wire:submit.prevent="getFillter(Object.fromEntries(new FormData($event.target)))">
    <div class="sidebar-widget price_range range mb-30">
        <div class="widget-header position-relative mb-20 pb-10">
            <h5 class="widget-title mb-10">Filtering</h5>
            <div class="bt-1 border-color-1"></div>
        </div>
        <div class="list-group">
            <div class="list-group-item mb-10 mt-10">
                <label class="fw-900">Pricing</label>
                <div class="custome-radio">
                    <input class="form-check-input" required="" type="radio" name="price_fillter" id="price1" value="price1">
                    <label class="form-check-label" for="price1" data-bs-toggle="collapse">$16 - $30</label>
                    <br>
                    <input class="form-check-input" required="" type="radio" name="price_fillter" id="price2" value="price2">
                    <label class="form-check-label" for="price2" data-bs-toggle="collapse">$30 - $60</label>
                    <br>
                    <input class="form-check-input" required="" type="radio" name="price_fillter" id="price3" value="price3">
                    <label class="form-check-label" for="price3" data-bs-toggle="collapse">$60 - $100</label>
                    <br>
                    <input class="form-check-input" required="" type="radio" name="price_fillter" id="price4" value="price4">
                    <label class="form-check-label" for="price4" data-bs-toggle="collapse">$100 - $300</label>
                    <br>
                </div>
            </div>
        </div>
        <div class="list-group">
            <div class="list-group-item mb-10 mt-10">
                <label class="fw-900">Rating</label>
                <div class="custome-radio">
                    @for ($i = 1; $i < 6; $i++)
                        <input class="form-check-input" required="" type="radio" name="rating" id="rate{{$i}}" value="rate{{$i}}">
                        <label class="form-check-label" for="rate{{$i}}" data-bs-toggle="collapse">{{$i}}</label>
                        <br>
                    @endfor
                </div>
                <label class="fw-900 mt-15">Gender</label>
                <div class="custome-radio">
                    <input class="form-check-input" required="" type="radio" name="gender" id="gender1" value="Male">
                    <label class="form-check-label" for="gender1" data-bs-toggle="collapse"><span>Man</span></label>
                    <br>
                    <input class="form-check-input" required="" type="radio" name="gender" id="gender2" value="Female">
                    <label class="form-check-label" for="gender2" data-bs-toggle="collapse"><span>Woman</span></label>
                    <br>
                </div>
            </div>
        </div>
        <button class="submit" type="submit"><i class="fi-rs-filter mr-5"></i>Fillter</button>
    </div>
</form>