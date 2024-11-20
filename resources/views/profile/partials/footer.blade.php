
{{--  <footer class="d-flex justify-content-between align-items-center py-2 border-top" style="background-color: black; height: 50px; position: fixed; width: 100%; bottom: 0;font-size:14px;">
    <div class="text-white" style="padding-left: 10px;">
        Hand-crafted & made with <span style="color: red;">❤️</span>
    </div>
    <div class="text-white" style="padding-right: 10px;">
        Copyright © 2024 Aurora Jewels
    </div>
</footer>  --}}

<style>
footer {
    background-color: black;
    color: white;
    height: 50px;
    font-size: 14px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #ddd;
    padding: 0 10px;
}
</style>

@if (!Request::is('/') && !Request::is('user-scheme'))
    <footer>
        <div>
            Hand-crafted & made with <span style="color: red;">❤️</span>
        </div>
        <div>
            Copyright © 2024 All rights reserved | Aurora Jewels
        </div>
    </footer>
@endif



