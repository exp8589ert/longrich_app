<?php 
	require 'includes/check.php';
	require 'header.php';
?>

<section class="target u-modal">
	<div class="target content">
		<iframe id="youtube" width="100%" height="100%" allowscriptaccess="always" frameborder="0" allow="autoplay" class="video-iframe" allowfullscreen>        	
        </iframe>
		<a class="bonus-system" data-youtube-id="Y_3eAChf53Y"></a>f
	</div>
</section>

<?php include'includes/logout.php'; ?>

<div id="menu-wrapper" class="universal-menu help benefit-h">
	<aside class="benefit-logo">
		<a href="https://longrichs.com"><div class="white-logo index"></div>
		</a>
	</aside>
	<?php include("menu.php") ?>
</div>

<section class="wrapper benefit-wrapper">

<section class="b-background">
	<div class="b-wrapper">
		<div class="write-up" id="systems">
			<span>
			Get paid for doing what you love, and every other paycheck becomes a bonus!
			</span>
			<br />
			<br />
			<span class="small-font">Check out some of longrich's bonus system below
				<br /> Good luck!</span>
			<br />
			<br />
			<br />
			<div class="glow" >
				<button class="target show-button" title="Play"><i class="fas fa-play show-button"></i></button>
			</div>
		</div>
	</div>
</section>

<div id="earnings">
	<a href="earnings" target="_blank">
		<label>Sample Earnings</label>
		<div><i class="fas fa-angle-right"></i></div>
	</a>
	<span id="advanced"></span>
</div>

<div id="testimonial-bg"></div>
<div class="inner-wrapper">
<div class="benefits">
<div class="title">Income Bonuses & Incentives [Compensation Plan] <br />
</div>

<br />
<br />

<section class="bonus first">

<div class="benefit">
<label>PERFORMANCE BONUS 12% (WEEKLY)</label> <span class="first"></span>
<ul>
<li>Paid on unlimited Levels</li>
<li>Limited to Entry Level</li>
<li>Unlimited Accumulative PV</li>
<li>Unlimited Direct Group(s)</li>
<li>Weekly Payout Returns</li>
<li>Higher Returns</li>
</ul>
</div>

<div class="benefit">
<label>LEADERSHIP BONUS 45% (WEEKLY)</label> <span class="second"></span>
<ul>
<li>10% - 45% on all Levels</li>
<li>Earn Up to 12 Generations</li>
<li>Unlimited & High Payout</li>
<li>Unlimited Weekly Payout * No Ceiling</li>
<li>Payable to Leaders above 1 - Diamond</li>
<li>Never Demote Ranking</li>
</ul>
</div>

<div class="benefit">
<label>DEVELOPMENT BONUS 10% Flat (WEEKLY)</label><span class="third"></span>
<ul>
<li>Paid on unlimited Levels</li>
<li>Limited to Entry Level</li>
<li>Unlimited Accumulative PV</li>
<li>Unlimited Payouts</li>
<li>Weekly Payout Returns</li>
<li>Comprehensive Returns</li>
</ul>
</div>

</section>

<section class="bonus second">

<div class="benefit">
<label>RETAIL ORDER BONUS 4.5%(MONTHLY)</label><span class="fouth"></span>
<ul>
<li>Must Maintain order above 30PV Every Month</li>
<li>Minimum of 21% up to 45% (max) Break Away Purchased Value.</li>
<li>Unlimited & High Payouts</li>
<li>Paid on retail/repeat orders</li>
<li>Unlimited Weekly Payout</li>
</ul>
</div>

<div class="benefit">
<label>PLATINUM VIP INCENTIVE 1% (CYCLE)</label><span class="fifth"></span>
<ul>
<li>Be a Share Holder and earn 1% of Longrich Global sales profit</li>
<li>This earning can be converted to Travel / Car / House equivalent</li>
<li>Monthly Accruals for active VIP Members</li>
</ul>
</div>

<div class="benefit">
<label>STAR DIRECTOR WORLDWIDE (WEEKLY)</label><span class="sixth"></span>
<ul>
<li>Earn 1% of Company's global Shares</li>
<li>Incentives for Star Directors are rewarded in the quarterly meeting, and paid out in cash</li>
<li>Diamond 4 and above member earn profits of 1% for Travel only.</li>
<li>Diamond 7 and above member earn profits of 1% for Travel, 1% for Car and 0.5% for House totalling 2.5%</li>
</ul>
</div> 

</section>

<section class="bonus third">

<div class="benefit">
<label>LUXURY TRAVEL INCENTIVES</label><span class="seventh"></span>
<ul>
<!-- <li>Longrich sets aside 2.5% of its global profits for these incentives.</li> -->
<li>Diamond 4 and above member earn profits of 1% for Travel and 1% for Car totalling 2% </li>
<li>Incentive points calculated based on Your ranking</li>
</ul>
</div> 


<div class="benefit">
<label>LUXURY CAR INCENTIVES</label><span class="eight"></span>
<ul>
<li>Diamond 6 and above member earn profits of 1% for Travel and 1% for Car totalling 2% </li>
<li>Longrich sets aside 2.5% of its global profits for these incentives</li>
<li>Diamond 4 and above member earn profits of 1% for Travel only.</li>
<li>Diamond 7 and above member earn profits of 1% for Travel, 1% for Car and 0.5% for House totalling 2.5% </li>
</ul>
</div> 

<div class="benefit">
<label>LUXURY HOUSE INCENTIVES</label><span class="ninth"></span>
<ul>
<li>Diamond 7 and above member earn profits of 1% for Travel, 1% for Car and 0.5% for House totalling 2.5% </li>
<li>Diamond 6 and above member earn profits of 1% for Travel and 1% for Car totalling 2% </li>
<li>Diamond 4 and above member earn profits of 1% for Travel only.</li>
<li>Longrich sets aside 2.5% of its global profits for these incentives</li>
</ul>
</div> 

</section>
</div>

<div class="tree-and-calc-wrapper">
<aside id="calculator">
<div class="calculator">
<div class="x-descr">ADVANCE BONUS CALCULATOR &nbsp;
<i class="fas fa-calculator"></i>
</div>
<label class="name desc">Bonus Type 
<span id="info">
<i class="far fa-question-circle"></i>
</span>
	<span class="info tooltips">
	Select Bonus Type and hover back to See Information on how each Bonus Type Selected is Calculated. <br /><br />
	Reference Leg is any Group with the Highest PV which is returned back to the Company.
	</span>
<?php include("bonus.php") ?>
</label>

<label id="membership" class="nodisplay name desc">Your Membership Level
<?php include("entry.php") ?>
</label>

<label id="stockistSales" class="name hideElement desc">
	Stockist Sales Per Week (Min. of 100 PV Sales)
	<input type="number" id="stockist" class="input calc-input stockist" placeholder="Min. of 100 PV Per Week" pattern="
	\d*" maxlength="9">
</label>

<div id="groups" class="nodisplay">
<label class="name desc">
	Groups' newly accumulated PV (Group A, B & C ).
	<div class="groups-pv">
	<input type="number" id="firstGroup" class="calc-input miniSixtyPv" placeholder="Min. of 60 PV" pattern="
	\d*" maxlength="9">
	<input type="number" id="secondGroup" class="calc-input miniSixtyPv" placeholder="Min. of 60 PV" pattern="
	\d*" maxlength="9">
	<input type="number" id="thirdGroup" class="calc-input miniSixtyPv" placeholder="Min. of 60 PV" pattern="
	\d*" maxlength="9">
	</div>
</label>

<label id="points-generated" class="hideElement name desc">
	Total Global Shares (Min. of 10,000 PV).
	<input type="number" id="generatedPV" class="mini10kPV calc-input" placeholder="Min. of 10,000 Points and Above" pattern="
	\d*" maxlength="9">
</label>
	
</div>

<div id="levels" class="stage-level first nodisplay">
<label class="name desc">
	First Level (Min. of 2 legs, 60 PV Entry Level Each leg.) 
	<span class="level addlevel">
		<i class="fas fa-plus"></i></span>
		<span class="tooltips">Add Another Level</span>
	<div class="groups-pv">

<input type="number" id="firstValue" class="calc-input miniSixtyPv" placeholder="Min. of 60 PV" pattern="
\d*" maxlength="9">
<input type="number" id="secondValue" class="calc-input miniSixtyPv" placeholder="Min. of 60 PV" pattern="
\d*" maxlength="9">
<input type="number" id="thirdValue" class="calc-input miniSixtyPv" placeholder="Min. of 60 PV" pattern="
\d*" maxlength="9">

</div>
</label>
</div>

<div id="second" class="stage-level second hideElement">
<label class="name desc">
	Second Level (Min. of 2 legs, 60 PV Entry Level Each leg.) 
	
	<span class="level removelevel">
	<i class="fas fa-minus"></i></span>
	<span class="tooltips">Remove Level</span>
	<div class="groups-pv">
	<input type="number" id="fourthValue" class="calc-input miniSixtyPv second-value" placeholder="Min. of 60 PV" pattern="
	\d*" maxlength="9">
	<input type="number" id="fifthValue" class="calc-input miniSixtyPv second-value" placeholder="Min. of 60 PV" pattern="
	\d*" maxlength="9">
	<input type="number" id="sixthValue" class="calc-input miniSixtyPv second-value" placeholder="Min. of 60 PV" pattern="
	\d*" maxlength="9">

</div>
</label>
</div>

<div id="rank" class="nodisplay">

<label class="name desc" id="your-rank">Your Rank
<?php include("ranking.php") ?>
</label>

<div id="minimumGPV" class="name">
<label class="name desc">Minimum Group PV Required &nbsp;(Leadership Bonus)
<input type="text" class="minimumGPV calc-input" disabled="disabled">
</label>
</div>

<div id="organization" class="name">
<label class="name desc">Organization Requirement &nbsp;(Leadership Bonus)
<input type="text" class="organization calc-input" disabled="disabled" placeholder="">
</label>
</div>

</div>

<div class="retail nodisplay">

<label class="name desc">No. of Distributors Per Month (Retail Bonus)
<input type="number" id="noDistributor" class="input totaldist calc-input" placeholder="Min. of 3 Distributor Per Month" pattern="
\d*" maxlength="9">
</label>

<label class="name desc">Monthly Min. 30PV Maintenance (Recurring Purchases)
<input type="number" id="noMonthlyPV" class="input monthlyPv calc-input" placeholder="Minimum of 30 PV Per Month" pattern="
\d*" maxlength="9">
</label>

<label class="ranking name desc">Break Away Purchase Value (Repeated Purchases / Month)
<?php include("breakaway.php") ?>
</label>

</div>

<div id="levels" class="stage-level">
<label>

<div class="groups-pv">
<label id="perform" class="nodisplay">Performance Bonus (%) 
<input type="text" class="calc-input" disabled="disabled">
</label>

<label id="development" class="nodisplay">Development Bonus (%) 
<input type="text" class="calc-input" disabled="disabled">
</label>
</div>

<div class="groups-pv">
<label id="leadership" class="nodisplay">Total Leadership Bonus (%) 
<input type="text" class="leadership calc-input" disabled="disabled">
</label>

<label id="retail" class="nodisplay">Retail/Maintenance Bonus (%) 
<input type="text" class="calc-input" disabled="disabled">
</label>
</div>

</label>
</div>

<div class="leadership nodisplay">
<div id="leadership-group">
<label class="label">Gene. Bonus (%)
<input type="text" disabled="disabled" class="input GenBonus calc-input">
</label>

<label class="label">Downlines Perf. Bs.
<div id="dollar-wrapper">
<span>$</span> <input type="number" id="downlinesPV" class="input downlinesPb calc-input" placeholder="10 and above" pattern="
\d*" maxlength="9">
</div>
</label>

<label class="label">Generation
<select id="generation">
	<option disabled="disabled"></option>
	<option data-percent="zero" class="" value="0" selected="selected">Select Gene.</option>
	<option data-percent="0.10" class="d1 d2 d3 d4 d5 d6 d7 s1 s2 s3 s4 s5">1st earn 10%</option>
	<option data-percent="0.05" class="d2 d3 d4 d5 d6 d7 s1 s2 s3 s4 s5">2nd earn 5%</option>
	<option data-percent="0.05" class="d3 d4 d5 d6 d7 s1 s2 s3 s4 s5">3rd earn 5%</option>
	<option data-percent="0.05" class="d4 d5 d6 d7 s1 s2 s3 s4 s5">4th earn 5%</option>
	<option data-percent="0.05" class="d5 d6 d7 s1 s2 s3 s4 s5">5th earn 5%</option>
	<option data-percent="0.05" class="d6 d7 s1 s2 s3 s4 s5">6th earn 5%</option>
	<option data-percent="0.05" class="d7 s1 s2 s3 s4 s5">7th earn 5%</option>
	<option data-percent="0.01" class="s1 s2 s3 s4 s5">8th earn 1%</option>
	<option data-percent="0.01" class="s2 s3 s4 s5">9th earn 1%</option>
	<option data-percent="0.01" class="s3 s4 s5">10 earn 1%</option>
	<option data-percent="0.01" class="s4 s5">11th earn 1%</option>
	<option data-percent="0.01" class="s5">12th earn 1%</option>
	<option disabled="disabled" class=""></option>
</select>
</label>
</div>
</div>

<label class="bonus-percent name desc">Bonus Percentage (%) 
<input type="text" class="calc-input" disabled="disabled">
</label>

<label class="name desc">Total Bonus:
	<span class="clear"><i class="far fa-trash-alt"></i> CLEAR</span>
	<input type="text" id="calc-result" class="result-a output calc-input" disabled="disabled">
</label>

<div class="errormsg"></div>
<br />
<button id="bigCalcBtn">Calculate</button>
</div>
<br />

<span class="sample-link">
	<a href="earnings" target="_blank">
	<i class="fas fa-external-link-alt"></i> 
	View sample earnings </a>
</span>

<a href="benefits#advanced">
	<span id="reset" title="Reset">
	<i class="fas fa-undo-alt"></i>
	</span>
</a>

</aside>

<aside class="tree-explanation">

<div class="you"> You <label class="week level">Entry level: Platinum VIP (1,680 PV)</label>
</div>
<br/>

<div class="leg-wrapper">
<label class="week first">1st Level</label>
<hr> 

<div class="you A company">A<span class="vert-line"></span></div>
<div id="outwards" class="you B">B<span id="middle" class="vert-line"></span>
<span id="middlelower" class="vert-line"></span>
</div>
<div class="you C">C<span class="vert-line"></span></div>
</div>

<div class="leg-wrapper second">

<label class="week second">2nd Level</label>
<div class="first">
<span class="vert-line"></span><hr>
<div class="you A first-leg legs company">X
<span class="vert-line"></span>
</div>
<div class="you B second-leg legs">Y
<span class="vert-line"></span></div>
<div class="you C third-leg legs">Z
<span class="vert-line"></span></div>
<span class="groups">Group A</span>
</div>


<div class="second">
<span class="groups-seperator"></span>
<hr>
<div class="you A fourth-leg legs company">X
<span class="vert-line"></span></div>
<div class="you B fifth-leg legs">Y
<span class="vert-line"></span></div>
<div class="you C sixth-leg legs">Z
<span class="vert-line"></span></div>
<span class="groups">Group B</span>
</div>

<div class="third">
<span class="groups-seperator"></span>
<span class="vert-line"></span><hr>
<div class="you A seventh-leg legs company">X
<span class="vert-line"></span></div>
<div class="you B eight-leg legs">Y
<span class="vert-line"></span></div>
<div class="you C ninth-leg legs">Z
<span class="vert-line"></span></div>
<span class="groups">Group C</span>
</div>

</div>

</aside>

<div class="level-explanation second" id="bonus-calc">
<section class="bonus">
<aside><label class="bonus-calculation">
Performance Bonus Calculation [12% Weekly]</label>
<div class="performance"></div>
</aside>

<aside>
<label class="bonus-calculation">
Development Bonus Calculation [10% Weekly]</label>
<div class="development"></div>
</aside>
</section>

<section class="bonus">
<aside>
<label class="bonus-calculation">Leadership Bonus Calculation [45% Weekly]</label>
<div class="leadership-bonus"></div>
</aside>

<aside>
<label class="bonus-calculation">Retail/Maintenance Bonus Calculation 4.5% (Cycle)</label>
<div class="retail_main-bonus"></div>
</aside>

</section>

<section class="testimonials">
<h2 class="test">
Members Testimonials. <br /> <span>What they're Saying.</span>
</h2>
</section>

<section class="testimonials-section">
<div class="exception left each-div disc">
Longrich's reward system is a real-world business school for people who want to learn the real-world skills of an entrepreneur, rather than the skills of an employee.
</div>

<div class="each-div">
<img class="users" src="https://longrichs.com/resources/images/benefits/chi.jpg">
<p>Even if you don't have the courage to talk to people about longrich, Just create a whatsapp group and use your referral link.</p>
<label>Chima Jonathan</label><br />
<span class="stars"></span>
<span class="stars"></span>
<span class="stars"></span>
<span class="stars"></span>
<span class="stars"></span><br />
<a href="https://web.facebook.com/chima.jonathan.3" title="Connect on Facebook" target="_blank">
	<img class="exception facebook">
</a>
<!-- <a href="#" title="Connect on Twitter">
	<img class="exception twitter" >
</a> -->
</div>

<div class="each-div">
<img class="users" src="https://longrichs.com/resources/images/benefits/nwuye.jpg">
	<p>Longrich business is absolutely beneficial. To be honest with you, i earn more in longrich than i earn in my current job.</p>
	<label>Nwune Onyinye</label><br />
	<span class="stars"></span>
	<span class="stars"></span>
	<span class="stars"></span>
	<span class="stars"></span>
	<span class="stars"></span><br />
	<a href="https://web.facebook.com/nwune.onyinye" target="_blank" title="Connect on Facebook">
		<img class="exception facebook">
	</a>
	<!-- <a href="twitter" title="Connect on Twitter">
		<img class="exception twitter" >
	</a> -->
</div>

<div class="each-div">
<img class="users" src="https://longrichs.com/resources/images/benefits/testimonials2.jpg">
	<p>From my scientific findings, the system has the potential to pay out over <br /> 1.2 Billion USD in 5 - 7 years to come. This is a residual income for the members.</p>
	<label>Michael George</label><br />
	<span class="stars"></span>
	<span class="stars"></span>
	<span class="stars"></span>
	<span class="stars"></span>
	<span class="stars"></span><br />
	<!-- <a href="facebook" title="Connect on Facebook">
		<img class="exception facebook">
	</a> -->
	<!-- <a href="twitter" title="Connect on Twitter">
		<img class="exception twitter" >
	</a> -->
</div>
</section>

</div>
</div>
<br />
<div class="incentives-wrapper">

<div class="incentives" id="travelIncentive">
<label>TRAVEL INCENTIVE</label>
<img src="resources/images/travel.png" alt="">
<ul>
<li><span>Requirement</span>4 Diamond and Above</li>
<li>Longrich organizes minimum of three to four all-expense paid international trips annually for deserving distributors who meet the above requirements.
</li>
<li>
So far the company has organized trips to Malaysia, USA, Dubai, United Kingdom, South Africa and China.
</li> 
<li class="link">
</li>
</ul>
</div> 

<div class="incentives">
<span id="mba-programme"></span>
<label>EXECUTIVE MBA PROGRAMME IN USA</label>
<img src="resources/images/mba.png" alt="">
<ul>
<li><span>Requirement</span>6 Diamond and Above</li>
<li>Longrich Int'l sponsors Star Directors for a 4 year Executive Master of  Business Administration programme in Regis University in Denver, Colorado (USA)</li>
<li class="link">
</li>
</ul> 
</div> 

<div class="incentives" id="scholarshipIncentive">
<label>SCHOLARSHIP INCENTIVE</label>
<img src="resources/images/award.png" alt="">
<ul>
<li><span>Requirement</span>6 Diamond and Above</li>
<li>Longrich sponsors a 4 year degree program to study any course of your choice in the prestigious SOCHOOW SUZHOUW University in China.</li>
<li>Directors are given slots to recommend any person of their choice.</li>
<li class="link"></li>
</ul> 
</div> 

<div class="incentives">
<span id="car-incentives"></span>
<label>CAR INCENTIVE</label>
<img src="resources/images/car.jpg" alt="">
<ul>
<li><span>Requirement</span>6 Diamond and Above</li>
<li>Longrich runs a yearly Car promo. The Company has awarded over 300 brand new cars within 4 years of her operation in Nigeria.</li>
<li class="link"></li>
</ul> 
</div> 

<div class="incentives">
<span id="house-incentives"></span>
<label>HOUSE INCENTIVE</label>
<img src="resources/images/house.png" alt="">
<ul>
<li><span>Requirement</span>7 Diamond and Above</li>
<li>House fund of over 25 million Naira (now on higher review) is awarded at star director level.</li>

<li class="link"></li>
</ul> 
</div> 
</div>

<div class="company-advantage">
<h2>COMPANY'S KEY FEATURES</h2>
<ol>
<li>Well Established Industrialization</li>
<li>Comprehensive Solution Provider</li>
<li>Different Incentives</li>
<li>Amazing Brand Value</li>
<li>Excellent Management Team</li>
</ol>
<ol>
<li>World-Leading R&D</li>
<li>Fast Growing Global Market</li>
<li>High Quality Products</li>
<li>Well Established Company Culture</li>
<li>You win, We win Business Model</li>
</ol>
</div>

<div class="gallery">
<a href="products">
<button class="goto-gallery">See Items</button>
</a>
</div>


<?php include("contact.php"); ?>

</div>
</section>
<?php include("footer.php") ?>