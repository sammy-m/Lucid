@extends('layouts.clientside')

@section('content')

<link rel="stylesheet" href={{URL('css/orderDetails.css')}}>


<section>
    <div class="details">

    <div class="form-hold">

    
            <form action="/order/detailss" method="post">
                {{ csrf_field() }}
    <div class="row-flexd row" style=" text-align:left">
           
        <div class="col-flex1 col-md-6 col-lg-6">
                <div class="middles">
                        <h6 style="text-align:left !important"><strong>Project purpose</strong></h6>
                </div>
                
                <div class="middle">
                   
                    <label>
                            <input type="radio" name="purpose" id="radioS" value="school" checked/>
                            <div class="front-end box" id="b1" onmousedown="getLevels()" onmouseout="getLevels()">
                            <span>School</span>
                            </div>
                    </label>

                    <label>
                        <input type="radio" name="purpose" value="work" id="radioW"/>
                        <div class="back-end box" id="b2" onmousedown="getLevels()" onmouseout="getLevels()">
                            <span>Work</span>
                        </div>
                    </label>

                   
                </div>

                <div class="service-type">
                    
                    <label for="typeofservice"><strong>Type of service:</strong></label>
                </div>
                <div class="type-select">
                        <label>
                            <input type='radio' name="typeofservice" value="writing" checked>
                            <div class="writing box1" id="b1">
                                <span>Writing</span>
                            </div>
                        </label>
                        <label>
                            <input type='radio' name="typeofservice" value="editing">
                            <div class="editing box1" id="b2">
                                <span>Editing</span>
                            </div>
                        </label>
                        <label>
                            <input type="radio" name="typeofservice" value="proofreading">
                            <div class="proofreading box1" id="b3">
                                <span>Proofreading</span>
                            </div>
                        </label>
                    </div>

                    <div class="level">
                        
                        <label for="levels"><strong>Writing level:</strong></label>
                        <div>
                            <select class="browser-default custom-select @error('levels') is-invalid @enderror" name="levels" id="levels" >
                                
                            </select>
                            <!--input type="text" name="levels" class="form-control @error('levels') is-invalid @enderror" value="{{ old('levels')}}"-->
                            @error('levels')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>


        </div>

        <script type="application/javascript">
            function getLevels(){

                var x;
                var items;
                var types;
              //  var selectS=document.getElementById("typeS"), selectW=document.getElementById("typeW");
                if(document.getElementById("radioS").checked){
                    x = document.getElementById("radioS").value;
                    items = ["High School", "College-Freshman", "College-Sophomore", "College-Junior", "College-Senior", "Master's"] ;
                   document.getElementById('typeW').style.display = "none";
                   document.getElementById("typeW").disabled = true;
                   document.getElementById("typeS").disabled = false;
                   document.getElementById('typeS').style.display = "block";
                } else if(document.getElementById("radioW").checked){
                    x = document.getElementById("radioW").value;
                    items = ["Standard", "Premium"];
                    document.getElementById('typeS').style.display = "none";
                    document.getElementById("typeS").disabled = true;
                    document.getElementById("typeW").disabled = false;
                    document.getElementById('typeW').style.display = "block";
                }
                //console.log(x);
              //  var items;
              /*  if(x === 'school'){
                    items = ["High School", "College Freshman", "College Sophomore", "College Junior", "College Senior", "Master's"] ;
                } else{
                    items = ["Standard", "Premium"];
                }*/
                var str = "<option ></option>";
                for(var item of items){
                    str += '<option value=' +item+ '>'+item+'</option>'
                }

                document.getElementById("levels").innerHTML = str;
                }
               document.getElementById("radioS").addEventListener("click", getLevels);
               document.getElementById("radioW").addEventListener("click", getLevels);
               window.onload = function() {
                            getLevels();
                            };
        </script>
        <div class="col-flex2  col-md-6 col-lg-6">
                <div class="type-title" style="text-align:left"><strong>Project type</strong></div>
                <div class="selectType">
                    <select name="typeofproject" class="browser-default custom-select @error('typeofproject') is-invalid @enderror" id="typeS" >
                        <option data-select2-id="130"></option>
                        <option value="Essay" data-select2-id="132">Essay</option>
                        <option value="Research paper" data-select2-id="133">Research Paper</option>
                        <option value="Term paper" data-select2-id="134">Term Paper</option>
                        <option value="Coursework" data-select2-id="135">Coursework</option>
                        <option value="Case study" data-select2-id="136">Case Study</option>
                        <option value="Speech" data-select2-id="137">Speech</option>
                        <option value="Dissertation (all chapters)" data-select2-id="138">Dissertation (all chapters)</option>
                        <option value="Thesis (all chapters)" data-select2-id="139">Thesis (all chapters)</option>
                        <option value="PowerPoint Presentation" data-select2-id="140">PowerPoint Presentation</option>
                        <option value="PowerPoint Presentation with Speaker Notes" data-select2-id="141">PowerPoint Presentation with Speaker Notes</option>
                        <option disabled="" data-select2-id="142">-------------------------</option>
                        <option value="Admission Essay" data-select2-id="143">Admission Essay</option>
                        <option value="Application Essay" data-select2-id="144">Application Essay</option>
                        <option value="Article Critique" data-select2-id="145">Article Critique</option>
                        <option value="Article Review" data-select2-id="146">Article Review</option>
                        <option value="Article Writing" data-select2-id="147">Article Writing</option>
                        <option value="Assessment" data-select2-id="148">Assessment</option>
                        <option value="Bibliography" data-select2-id="149">Bibliography</option>
                        <option value="Biography" data-select2-id="150">Biography</option>
                        <option value="Book Review" data-select2-id="151">Book Review</option>
                        <option value="Business Plan" data-select2-id="152">Business Plan</option>
                        <option value="Business Proposal" data-select2-id="153">Business Proposal</option>
                        <option value="BVC Model Answer" data-select2-id="154">BVC Model Answer</option>
                        <option value="Capstone Project" data-select2-id="155">Capstone Project</option>
                        <option value="Case Study" data-select2-id="156">Case Study</option>
                        <option value="Coursework" data-select2-id="157">Coursework</option>
                        <option value="Creative Writing" data-select2-id="158">Creative Writing</option>
                        <option value="Dissertation (all chapters)" data-select2-id="159">Dissertation (all chapters)</option>
                        <option value="Dissertation Chapter - Abstract" data-select2-id="160">Dissertation Chapter - Abstract</option>
                        <option value="Dissertation Chapter - Conclusion" data-select2-id="161">Dissertation Chapter - Conclusion</option>
                        <option value="Dissertation Chapter - Discussion" data-select2-id="162">Dissertation Chapter - Discussion</option>
                        <option value="Dissertation Chapter - Hypothesis" data-select2-id="163">Dissertation Chapter - Hypothesis</option>
                        <option value="Dissertation Chapter - Introduction" data-select2-id="164">Dissertation Chapter - Introduction</option>
                        <option value="Dissertation Chapter - Literature" data-select2-id="165">Dissertation Chapter - Literature</option>
                        <option value="Dissertation Chapter - Methodology" data-select2-id="166">Dissertation Chapter - Methodology</option>
                        <option value="Dissertation Chapter - Results" data-select2-id="167">Dissertation Chapter - Results</option>
                        <option value="Dissertation Chapter - Other (not listed above)" data-select2-id="168">Dissertation Chapter - Other (not listed above)</option>
                        <option value="Dissertation Proposal" data-select2-id="169">Dissertation Proposal</option>
                        <option value="Entrance Essay" data-select2-id="170">Entrance Essay</option>
                        <option value="Essay" data-select2-id="171">Essay</option>
                        <option value="GCSE Coursework" data-select2-id="172">GCSE Coursework</option>
                        <option value="GCSE Outline Answer" data-select2-id="173">GCSE Outline Answer</option>
                        <option value="GNVQ Coursework" data-select2-id="174">GNVQ Coursework</option>
                        <option value="GNVQ Outline" data-select2-id="175">GNVQ Outline</option>
                        <option value="Grant Proposal" data-select2-id="176">Grant Proposal</option>
                        <option value="IB Extended Essay" data-select2-id="177">IB Extended Essay</option>
                        <option value="Interview" data-select2-id="178">Interview</option>
                        <option value="Lab Report" data-select2-id="179">Lab Report</option>
                        <option value="Literature Review" data-select2-id="180">Literature Review</option>
                        <option value="LPC Model Answer" data-select2-id="181">LPC Model Answer</option>
                        <option value="Marketing Plan" data-select2-id="182">Marketing Plan</option>
                        <option value="Movie Review" data-select2-id="183">Movie Review</option>
                        <option value="Multiple choice questions" data-select2-id="184">Multiple choice questions</option>
                        <option value="Numerical Problem Solving" data-select2-id="185">Numerical Problem Solving</option>
                        <option value="Outline" data-select2-id="186">Outline</option>
                        <option value="Outline Answer" data-select2-id="187">Outline Answer</option>
                        <option value="PhD Model Answer" data-select2-id="188">PhD Model Answer</option>
                        <option value="Poem" data-select2-id="189">Poem</option>
                        <option value="PowerPoint Presentation with Speaker Notes" data-select2-id="190">PowerPoint Presentation with Speaker Notes</option>
                        <option value="PowerPoint Presentation" data-select2-id="191">PowerPoint Presentation</option>
                        <option value="Problem Solving" data-select2-id="192">Problem Solving</option>
                        <option value="Questionnaire" data-select2-id="193">Questionnaire</option>
                        <option value="Reaction Paper" data-select2-id="194">Reaction Paper</option>
                        <option value="Research Paper" data-select2-id="195">Research Paper</option>
                        <option value="Research Proposal" data-select2-id="196">Research Proposal</option>
                        <option value="Scholarship Essay" data-select2-id="197">Scholarship Essay</option>
                        <option value="Short answer questions" data-select2-id="198">Short answer questions</option>
                        <option value="Short Story" data-select2-id="199">Short Story</option>
                        <option value="Speech" data-select2-id="200">Speech</option>
                        <option value="SWOT Analysis" data-select2-id="201">SWOT Analysis</option> 
                        <option value="Term Paper" data-select2-id="202">Term Paper</option> 
                        <option value="Thesis (all chapters)" data-select2-id="203">Thesis (all chapters)</option> 
                        <option value="Thesis Chapter - Abstract" data-select2-id="204">Thesis Chapter - Abstract</option> 
                        <option value="Thesis Chapter - Background" data-select2-id="205">Thesis Chapter - Background</option> 
                        <option value="Thesis Chapter - Conclusion and Future Works" data-select2-id="206">Thesis Chapter - Conclusion and Future Works</option> 
                        <option value="Thesis Chapter - Implementation" data-select2-id="207">Thesis Chapter - Implementation</option> 
                        <option value="Thesis Chapter - Introduction" data-select2-id="208">Thesis Chapter - Introduction</option> 
                        <option value="Thesis Chapter - Results and Evaluation" data-select2-id="209">Thesis Chapter - Results and Evaluation</option> 
                        <option value="Thesis Chapter - Theory and Problem Statement" data-select2-id="210">Thesis Chapter - Theory and Problem Statement</option> 
                        <option value="Thesis Chapter - Other (not listed above)" data-select2-id="211">Thesis Chapter - Other (not listed above)</option> 
                        <option value="Thesis Proposal" data-select2-id="212">Thesis Proposal</option> 
                        <option value="White Paper" data-select2-id="213">White Paper</option> 
                        <option value="Other (not listed above)" data-select2-id="214">Other (not listed above)</option>
                    </select>

                    <select name="typeofproject" id="typeW" class="browser-default custom-select @error('typeofproject') is-invalid @enderror" style="display:none">
                        <option value="null" data-select2-id="218"></option> 
                        <option value="Business Writing" data-select2-id="220">Business Writing</option> 
                        <option value="Articles/Blog posts" data-select2-id="221">Articles/Blog posts</option> 
                        <option value="Brochure" data-select2-id="222">Brochure</option> 
                        <option value="Business plan" data-select2-id="223">Business plan</option> 
                        <option value="Business proposal" data-select2-id="224">Business proposal</option> 
                        <option value="Case study" data-select2-id="225">Case study</option> 
                        <option value="Company manual" data-select2-id="226">Company manual</option> 
                        <option value="Corporate communication" data-select2-id="227">Corporate communication</option> 
                        <option value="Corporate documents" data-select2-id="228">Corporate documents</option> 
                        <option value="Cover letter" data-select2-id="229">Cover letter</option> 
                        <option value="CV" data-select2-id="230">CV</option> 
                        <option value="E-mail marketing" data-select2-id="231">E-mail marketing</option> 
                        <option value="Ghostwriting" data-select2-id="232">Ghostwriting</option> 
                        <option value="Interview" data-select2-id="233">Interview</option> 
                        <option value="Letter" data-select2-id="234">Letter</option> 
                        <option value="Marketing plan" data-select2-id="235">Marketing plan</option> 
                        <option value="Memo" data-select2-id="236">Memo</option> 
                        <option value="Newsletter" data-select2-id="237">Newsletter</option> 
                        <option value="PowerPoint Presentation" data-select2-id="238">PowerPoint Presentation</option> 
                        <option value="PowerPoint Presentation with Speaker Notes" data-select2-id="239">PowerPoint Presentation with Speaker Notes</option> 
                        <option value="Press kit" data-select2-id="240">Press kit</option> 
                        <option value="Press release" data-select2-id="241">Press release</option> 
                        <option value="Questionnaire" data-select2-id="242">Questionnaire</option> 
                        <option value="Report" data-select2-id="243">Report</option> 
                        <option value="Resume" data-select2-id="244">Resume</option> 
                        <option value="SEO copy" data-select2-id="245">SEO copy</option> 
                        <option value="Speech" data-select2-id="246">Speech</option> 
                        <option value="SWOT analysis" data-select2-id="247">SWOT analysis</option> 
                        <option value="Website copywriting" data-select2-id="248">Website copywriting</option> 
                        <option value="White paper" data-select2-id="249">White paper</option>
                        <option value="Other (Not listed above)" data-select2-id="249">Other (Not listed above)</option>
                    </select>

                    @error('typeofproject')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="row count-space">
                    <div class="col count">
                         <h6 style="text-align:left"><strong>page count</strong></h6>
                         <div class="numberinput def-number-input number-input safari_only">
                                <label onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                        <div class="one box2" id="b1" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus">
                                            <span>-</span>
                                        </div>
                                    </label>
                                
                                 
                                        <input class="quantity" min="1" value="1" name="pagecount" type="number" readonly="true">
                                    
                               
                                <label onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus">
                                    <div class="one box2" id="b3" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                        <span>+</span>
                                    </div>
                                </label>
                                <!--label class="btn btn-outline-danger"  onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"><span>-</span></label>
                                <input class="quantity" min="1" value="1" name="pagecount" type="number">
                                <label class="btn btn-outline-success" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"><span>+</span></label-->
                              </div>

                              <!--style type="application/css">
                              .number-input input[type="number"] {
                                -webkit-appearance: textfield;
                                -moz-appearance: textfield;
                                appearance: textfield;
                                width: 50px;
                                height: 40px;
                                margin: -4px;
                                }
                               .number-input button{
                                   margin: 0;
                                   height: 40px;
                               }
                               .number-input button span{
                                 font-size: 20pt;
                                 transform: translateY(-10px);
                               }
                              </style-->

                    </div>
                    <div class="col space">
                        <label for="spacing" style="text-align:left"><strong>line spacing</strong></label>
                        <div class=" line-space">
                        <label>
                                <input type='radio' name="spacing" value="single">
                                <div class="one box2" id="b1">
                                    <span>1</span>
                                </div>
                            </label>
                            <label>
                                <input type='radio' name="spacing" value="double" checked>
                                <div class="2 box2" id="b2">
                                    <span>2</span>
                                </div>
                            </label>
                    </div>
                    </div>
                </div>
                <div class="spelling">
                    <div class="hed">
                            <label for="spell" style="text-align:left"><strong>spelling</strong></label>
                    </div>
                <div class="radios">
                        <input name="spell" value="american" type="radio" checked>American  &nbsp;
                        <input name="spell" value="british" type="radio">British
                </div>
                    
                </div>
                <br>

                <div class="writer-preference">
                    <label for="writer" style="text-align:left !important"><strong>writer preference</strong></label>
                    <div class="writer-select">
                            <label>
                                <input type='radio' name="writer" value="best available" checked>
                                <div class="writing box1" id="bw1">
                                    <span>Best available</span>
                                </div>
                            </label>
                            <label>
                                <input type='radio' value="language proficiency" name="writer">
                                <div class="editing box1" id="bw2">
                                    <span>By Language Proficiency</span>
                                </div>
                            </label>
                            <label>
                                <input type="radio" name="writer" value="previous order">
                                <div class="proofreading box1" id="bw3">
                                    <span>By previous order</span>
                                </div>
                            </label>
                        </div>
                </div>

        </div> 
        <div class="proceed" style="text-align:right; width: 100% !important; margin:30px 10px 0 10px; padding-right:10px; border-top: grey 1px solid;">
            <br>
            <button class="btn btn-primary" type="submit" style="text-align:right;">Go to Instructions ></button>
        </div>

   
    </div>
</form>
</div>

    <div class="float-right guide-float-right">
        <div class="title">
            <h6><strong>Files</strong></h6>
        </div>
        <div>
            <p>To upload a new file or check for incoming files, click on the 'Files' tab. If the file
                is too big to upload, you can simply email it to support@studyref.com
            </p>
        </div>
        <div class="title">
            <h6><strong>Messages.</strong></h6>
        </div>
        <div>
            <p>To communicate with your writer or speak to a support representative, use the 'Messages' tab.
                ask questions, get updates, control the order progress and more.
            </p>
        </div>

        <div class="title">
            <h6><strong>Get more, pay less</strong> </h6>
        </div>
        <div>
            <p>Save big as you receive premium quality results.</p>
        </div>

    </div>
    

</div>
</section>
@endsection