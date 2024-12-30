@extends('front.layouts.appprofile')
@section('title', 'Title Generator')
@section('section')

<section class="edit-sec title-generator">
    <h3>Generate titles for articles and blog posts</h3>
    
        <div class="form-group">
            <textarea name="" id="txt-content" class="form-control" placeholder="Just enter your article and blog content here and go!"></textarea>
        </div>
        <div class="submit-row">
            <button class="btn btn-submit" id="btn-generate">Generate Title</button>
        </div>
    <h3>Select Suitable titles for your articles and blog posts</h3>
    <div class="checkbox-options-list" id="get-title">
        <!-- <ul class="list-unstyled m-0 p-0">
            <li>
                <label for="titleop1">
                    <input type="checkbox" name="titleops" id="titleop1" checked>
                    <span class="checkmark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M13.3334 4L6.00008 11.3333L2.66675 8" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Apply These 8 Secret Techniques To Improve Next Week
                </label>
            </li>
            <li>
                <label for="titleop2">
                    <input type="checkbox" name="titleops" id="titleop2" checked>
                    <span class="checkmark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M13.3334 4L6.00008 11.3333L2.66675 8" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Believing These 8 Myths About Next Week Keeps You From Growing
                </label>
            </li>
            <li>
                <label for="titleop3">
                    <input type="checkbox" name="titleops" id="titleop3" checked>
                    <span class="checkmark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M13.3334 4L6.00008 11.3333L2.66675 8" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Don't Waste Time! 8 Facts Until You Reach Your Next Week
                </label>
            </li>
            <li>
                <label for="titleop4">
                    <input type="checkbox" name="titleops" id="titleop4" checked>
                    <span class="checkmark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M13.3334 4L6.00008 11.3333L2.66675 8" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    How 8 Things Will Change The Way You Approach Next Week
                </label>
            </li>
            <li>
                <label for="titleop5">
                    <input type="checkbox" name="titleops" id="titleop5" checked>
                    <span class="checkmark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M13.3334 4L6.00008 11.3333L2.66675 8" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Next Week Awards: 8 Reasons Why They Don't Work & What You Can Do About It
                </label>
            </li>
            <li>
                <label for="titleop6">
                    <input type="checkbox" name="titleops" id="titleop6">
                    <span class="checkmark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M13.3334 4L6.00008 11.3333L2.66675 8" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Next Week Doesn't Have To Be Hard. Read These 8 Tips
                </label>
            </li>
            <li>
                <label for="titleop7">
                    <input type="checkbox" name="titleops" id="titleop7">
                    <span class="checkmark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M13.3334 4L6.00008 11.3333L2.66675 8" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Next Week Is Your Worst Enemy. 8 Ways To Defeat It
                </label>
            </li>
            <li>
                <label for="titleop8">
                    <input type="checkbox" name="titleops" id="titleop8">
                    <span class="checkmark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M13.3334 4L6.00008 11.3333L2.66675 8" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Next Week On A Budget: 8 Tips From The Great Depression
                </label>
            </li>
            <li>
                <label for="titleop9">
                    <input type="checkbox" name="titleops" id="titleop9">
                    <span class="checkmark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M13.3334 4L6.00008 11.3333L2.66675 8" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Knowing These 8 Secrets Will Make Your Next Week Look Amazing
                </label>
            </li>
            <li>
                <label for="titleop10">
                    <input type="checkbox" name="titleops" id="titleop10">
                    <span class="checkmark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M13.3334 4L6.00008 11.3333L2.66675 8" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Master The Art Of Next Week With These 8 Tips
                </label>
            </li>
            <li>
                <label for="titleop11">
                    <input type="checkbox" name="titleops" id="titleop11">
                    <span class="checkmark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M13.3334 4L6.00008 11.3333L2.66675 8" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    My Life, My Job, My Career: How 8 Simple Next Week Helped Me Succeed
                </label>
            </li>
            <li>
                <label for="titleop12">
                    <input type="checkbox" name="titleops" id="titleop12">
                    <span class="checkmark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M13.3334 4L6.00008 11.3333L2.66675 8" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Take Advantage Of Next Week - Read These 8 Tips
                </label>
            </li>
            <li>
                <label for="titleop13">
                    <input type="checkbox" name="titleops" id="titleop13">
                    <span class="checkmark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M13.3334 4L6.00008 11.3333L2.66675 8" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    The Next 8 Things You Should Do For Next Week Success
                </label>
            </li>
            <li>
                <label for="titleop14">
                    <input type="checkbox" name="titleops" id="titleop14">
                    <span class="checkmark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M13.3334 4L6.00008 11.3333L2.66675 8" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    The Time Is Running Out! Think About These 8 Ways To Change Your Next Week
                </label>
            </li>
            <li>
                <label for="titleop15">
                    <input type="checkbox" name="titleops" id="titleop15">
                    <span class="checkmark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M13.3334 4L6.00008 11.3333L2.66675 8" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    The 8 Best Things About Next Week
                </label>
            </li>
        </ul> -->
    </div>
</section>

@endsection
@section('script')
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
   $("document").ready(function(){
    $('#btn-generate').on("click",function(){
        //alert("i am in");
        var txt = $('#txt-content').val();
        console.log(txt);

        var data = {
            "prompt": txt,
            "api": "google",
            "number": 2
        }

        $.ajax({
                type:'POST',
                dataType:'JSON',
                url:"https://title-api.onrender.com",
                data:{ prompt: txt, api:"google", number:1},
                success:function(response)
                {
                    console.log(response);
                    $('#get-title').html(response.google.generated_text);
                },
                error: function(response)
                {
                    console.log(response);
                }
              });
    })
   });
    
</script>