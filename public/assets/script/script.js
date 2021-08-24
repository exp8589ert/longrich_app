var ngamount = new Intl.NumberFormat('en-NG', {
		style: 'currency',
		currency: 'NGN',
		minimumFractionDigits: 0
});


if (window.history.replaceState) {
	  window.history.replaceState( null, null, window.location.href );
}


(()=> {
	var links = $(".product-document table tbody a"), x;
	for(k = 0; k < links.length; k++) {
		links.click((e)=> {
			e.preventDefault();
		});
	}
})();



$('[class*="calc-input"]').on('keypress', function() {
	$this = $(this);
	return $this.val().length < 9;
	($this.val().length >= 9)? (()=>{ 
	$this.val() = $this.val().slice(0,9);
	})() : console.log('');
});


var errArrMsg = [
	'<span class="error_msg">Error!, Please fill in and select all required fields.</span>',
	'<span class="error_msg">Family name cannot be empty or less than 2 charachters.</span>',
	'<span class="error_msg">First name cannot be empty.</span>',
	'<span class="error_msg">Error! Biography description can not be empty.</span>',
	'<span class="error_msg">Email address can not be empty or invalid.</span>',
	'<span class="error_msg">Error! Email address is invalid.</span>',

	'<span class="error_msg">Error! current password field can not be empty.</span>',
	'<span class="error_msg">Current password must be a min. of 8 charachters.</span>',
	'<span class="error_msg">Current password entered in field is weak.</span>',
	'<span class="error_msg">Please enter your registered 11 digit phone number.</span>',
	'<span class="error_msg">New password field can not be empty.</span>',
	'<span class="error_msg">New password must contain at least 1 uppercase letter, 1 lowercase letter, 1 number and at least 8 characters long.</span>',
	'<span class="error_msg">New password entered in field is weak.</span>',
	'<span class="error_msg">Confirm new password field can not be empty.</span>',
	'<span class="error_msg">Confirm new must contain at least 1 uppercase letter, 1 lowercase letter, 1 number and at least 8 characters long.</span>',
	'<span class="error_msg">Confirm new password entered in field is weak.</span>',
	'<span class="error_msg">Error! old password and new password are the same.</span>',
	'<span class="error_msg">New password and confirm password does not match.</span>'

];




/*
Advanced Calculator begins.
benefits.php */

var errormsg = $('.errormsg'),
	bonusType = $('#bonus-type'),
	yourLevel = $('#packages'),	
	yourRank = $('#rank'),
	myrank = $('#your-rank'),
	ranking = $('#ranking'),
	breakaway = $('#breakaway'),
	firstGroup = $('#firstGroup'),
	secondGroup = $('#secondGroup'),
	thirdGroup = $('#thirdGroup'),
	genPV = $('#generatedPV'),
	downlinesPV = $('#downlinesPV'),
	firstValue = $('#firstValue'),
	secondValue = $('#secondValue'),
	thirdValue = $('#thirdValue'),
	fourthValue = $('#fourthValue'),
	fifthValue = $('#fifthValue'),
	sixthValue = $('#sixthValue'),
	seondLevelValue = $('[class*="second-value"]'),
	noDistributor = $('#noDistributor'),
	noMonthlyPV = $('#noMonthlyPV'),
	perfbonus = $('#perform > input'),
	devInput = $('#development > input'),	
	toggleDivs = $('[class*="nodisplay"]'),
	genInput = $('input[class*="calc-input"]'),
	groups = $('#groups'),
	pointsGtd = $('#points-generated'),
	stockistS = $('#stockistSales'),
	stockSales = $('#stockist'),
	organ = $('.organization'),
	outputRes = $('.result-a'),
	calcBtn = $('#bigCalcBtn');




	const bonusError = ()=> {
		errormsg.html(`<div class='emptyvalue'>Error! Please Select a Bonus Type.</div>`);
	};
	const elevelError = ()=> {
		errormsg.html(`<div class='emptyvalue'>Your Membership Level is Required!</div>`);
	};
	const stockError = ()=> {
		errormsg.html(`<div class='emptyvalue'>Please Enter a Minimum of 100 PV Stockist Sales!</div>`);
	};
	const miniSixtyPv = ()=> {
		errormsg.html(`<div class='emptyvalue'>Minimum of 60 new PV Required in Groups and Levels.</div>`);
	};
	const totalGPV = ()=> {
		errormsg.html(`<div class='emptyvalue'>Enter Minimum of 10,000 Group Sales Points.</div>`);
	};
	const devLevelError = ()=> {
		errormsg.html(`<div class='emptyvalue'>Minimum of 60 PV Required in each Leg, First Level.</div>`);
	};
	const secondError = ()=> {
		errormsg.html(`<div class='emptyvalue'>Minimum of 60 PV Required in each Leg, Second Level.</div>`);
	};
	const rankError = ()=> {
		errormsg.html(`<div class='emptyvalue'>Error! Please Select Membership Rank!</div>`);
	};
	const distError = ()=> {
		errormsg.html(`<div class='emptyvalue'>Minimum of 3 Distributor per Month Required.</div>`);
	};
	const monthlyError = ()=> {
		errormsg.html(`<div class='emptyvalue'>30 Monthly Minimum PV Maintenance Required.</div>`);
	};
	const breakawayError = ()=> {
		errormsg.html(`<div class='emptyvalue'>Please Select a Breakaway Purchase Value.</div>`);
	};
	const geneError = ()=> {
		errormsg.html(`<div class='emptyvalue'>Error! Please Select a Generation.</div>`);
	};
	const downlineError = ()=> {
		errormsg.html(`<div class='emptyvalue'>Enter Downlines Performance Bonus Amount.</div>`);
	};
	const downlinePB = ()=> {
		errormsg.html(`<div class='emptyvalue'>Minimum of $10 downlines Performance Bonus Required.</div>`);
	};
	const notNumberError = () => {
		errormsg.html(`<div class="emptyvalue">Please Enter Only Numerical Values.</div>`);
	};
	const errorGlo = ()=> {
			$this.css({
			'-webkit-box-shadow':'0px 0px 10px 0px #db4b4f',
			'-moz-box-shadow':'0px 0px 10px 0px #db4b4f',
			'box-shadow':'0px 0px 10px 0px #db4b4f' 
		});
	}
	const clearErrGlo = ()=> {
			$this.css({
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none',
			'box-shadow':'none'
		});
	}
	 function clearRes() {
		outputRes.val(``);
	}

var formula = null,
    mlevel = null,
    vmlevel = null,
    xmlevel = null,
    flevel = null,
    rankLevel = null,
    minipv = null,
    pvvalue = null,
    percent = null,
    leadResult = null,
    genPercent = null,
    breakvalue = null,
    pvbreak = null,
    pvbonus = null,    
	gresult = null,
	highestNum = null,
	x, y, z;

function resetLev() {
	$('#generation').val('0').trigger('change');
	breakaway.val('0').trigger('change');
	ranking.val('0').trigger('change');
	yourLevel.val('0').trigger('change');
}

bonusType.change(function(){
genInput.val(``);
minimize(formula);
stockistS.addClass('hideElement');
formula = $(this).find(':selected').data('bonus');
(formula === 'zero')? 
(()=> {	

$(".info.tooltips").html('Select Bonus Type and hover back to See Information on how each Bonus Type Selected is Calculated. <br /><br /> Reference Leg is any Group with the Highest PV which is returned back to the Company.').css('top', '2.5em');

bonusError(); 

toggleDivs.addClass('nodisplay'); })() :
errormsg.html(``);
$('div.groups-pv > label').css({
	'margin-right':'18px',
	'width':'100%',
	'font-size':'0.92em'
});
$('div.groups-pv > label:nth-child(even)').css('margin-right','0');
$('div#second').addClass('hideElement');
$('.bonus-percent').addClass('nodisplay');

(formula === 'addall')? (()=>{
toggleDivs.removeClass('nodisplay'); 
$('.info.tooltips').text(`All Bonus Types: This will add all the Bonus Types Available.`).css('top', '1.25em');
})() : 
toggleDivs.addClass('nodisplay'); 

(formula === 'perform')? (()=>{
	$('#groups, #perform, #membership').removeClass('nodisplay').css('margin-right', '0'); 
	$('.info.tooltips').text(`Performance Bonus: This is Calculated by Mutiplying the Bonus percentage of your Membership Level with addition of 2 groups (out of the 3 groups; A,B,C) with the least total PV. Incase of Platinum VIP Level and Above, 1% GS is added.`).css('top', '-0.5em');
	
})() : 
(formula === 'develop')? (()=>{
	$('#levels, #development').removeClass('nodisplay');
	groups.addClass('nodisplay'); 
	$('#perform').addClass('nodisplay'); 
	$('#development > input').val(`(10% * ${formula}) + (10% * ${formula})`);
	$('.info.tooltips').text(`Development Bonus: You get 10% weekly base on placement trees/Levels (1st, 2nd, 3rd levels and so on). Development Bonus is calculated by Mutiplying 10% of Addition of at 2 Legs of at Least 60PV entry Levels out of 3 Legs.`).css('top', '-0.5em');
})(): 
(formula === 'leader')? (()=> {
	yourRank.removeClass('nodisplay');
	$('#leadership').removeClass('nodisplay').css('margin-right','0');
	$('.leadership.nodisplay').removeClass('nodisplay');
	$('.info.tooltips').text(`Leadership Bonus: You get a Percentage of Your Downlines Performance Bonus upto 12 Generation based on Sponsorship and Ranking.`).css('top', '0.29em');
	 })() : 
(formula === 'retail')?  
	(()=> { 
		$('.retail').removeClass('nodisplay');
		$('#retail').removeClass('nodisplay'); 	
		$('.info.tooltips').text(`Retail/Maintenance Bonus: Calculated as No. of Distributors * 30PV * 4.5%. All distributors are required to maintain 30 PV worth of products Every Month to Maintain their Account and get their Commssion. `).css('top', '0');
	})() : 
		console.log();

		resetLev();
});

var minimize = (formula)=> {
$('#reset').on('click', function(){
		if(formula !== 'zero') {
			bonusType.val('0').trigger('change');
			errormsg.html(``);
			$('.bonus-percent').removeClass('nodisplay');
		}
	})
}

yourLevel.change(function() {
clearRes();
stockSales.val(``);
vmlevel = $(this).find(":selected").data("percent");
mlevel = $(this).find(':selected').data('gsales');
xmlevel = mlevel * 100;
const vipComm = perfbonus.val(`${vmlevel * 100}% Ref.B + ${xmlevel}% Stk.B + 1%GS.`);
genPV.val(``);

(mlevel === undefined)? 
(()=> { 
	elevelError(); 
})() : 
errormsg.html(``);
(mlevel % 1 !== 0)?
	(()=> {	
		// pointsGtd.removeClass('hideElement'); 
		(mlevel === 0.06 || mlevel === 0.04)? (()=> { 
			vipComm; 
			stockistS.removeClass('hideElement'); 
			pointsGtd.addClass('hideElement'); 
		})() : 
		(mlevel === 0.01)? (()=> {  
			perfbonus.val(`${vmlevel * 100}% Ref.B  + 1% G. Shares`);
			stockistS.addClass('hideElement');
			pointsGtd.removeClass('hideElement'); 
		})() : console.log('');
	})()
	:
	(()=> {
		stockistS.addClass('hideElement');
		pointsGtd.addClass('hideElement');
		const otherComm = $('#perform > input').val(`${vmlevel * 100}% Referral Bonus.`);
		(mlevel % 1 === 0 && mlevel === 0)?  otherComm : 
		(mlevel % 1 === 0 && mlevel === 0)? otherComm : 
		(mlevel % 1 === 0 && mlevel === 0)? otherComm : 
		(mlevel % 1 === 0 && mlevel === 0)? otherComm : 
		perfbonus.val('')
	})()
});


$('.level').on('click', function(e) {
	$this = $(this);
	errormsg.html(``);
	$('#development > input').val(``);
	($this.parents('.stage-level').attr('class').match(/\b(first)\b/))?
	 (()=>{ 
	 	$this.addClass('nodisplay');
	 	$('div#second').removeClass('hideElement'); 
	 	clearRes();
	 })() :
	 	(()=> {
	 		$('span.addlevel').removeClass('nodisplay');
		 	$('div#second').addClass('hideElement');
		 	seondLevelValue.val(``);
		 	clearRes();		
	 })()
});



$('#generation').on('change', function() {
	genPercent = $(this).find(':selected').data('percent');
	$('.GenBonus').val(parseInt(genPercent * 100)+'%');
	(genPercent === null || genPercent === 'zero')? 
	geneError(): errormsg.html(``);
	clearRes();
});
$('#generation option').addClass('nodisplay');



ranking.change(function() {
	minipv = $(this).find(':selected').data('minipv');
	pvvalue = parseInt($(this).find(':selected').val());
	percent = $(this).find(':selected').data('percent');
	leadResult = parseInt(percent * 100);
	clearRes();
	var reqmnt = ()=>{
			$('.minimumGPV').val(minipv);
			$('.leadership').val(`${leadResult}%`);
			errormsg.html(``);
	}

	var options = $('#generation > option');

	switch(pvvalue) {
		case 60000000:
			reqmnt();
			organ.val(`Mini. 3 Legs, One 3 Star Director in each Leg.`);
		    	options.filter(function(e,f){
		    		(e==1 || e <= 14)?  
		    		$(f).removeClass('nodisplay') : 
		    		$(f).addClass('nodisplay');
		    	});
			break;

		case 20000000:
			reqmnt();
			organ.val(`Mini. 3 Legs, One 2 Star Director in each Leg.`);
			options.filter(function(e,f){
		    		(e==1 || e <= 12)?  
		    		$(f).removeClass('nodisplay') : 
		    		$(f).addClass('nodisplay');
		    	});
			break;

		case 9000000:
			reqmnt();
			organ.val(`Mini. 3 Legs, One 1 Star Director in each Leg.`);
			options.filter(function(e,f){
		    		(e==1 || e <= 11)?  
		    		$(f).removeClass('nodisplay') : 
		    		$(f).addClass('nodisplay');
		    	});
			break;

		case 3750000:
			reqmnt();
			organ.val(`Mini. 3 Legs, One 7 Diamond in each Leg.`);
			options.filter(function(e,f){
		    		(e==1 || e <= 10)?  
		    		$(f).removeClass('nodisplay') : 
		    		$(f).addClass('nodisplay');
		    	});
			break;

		case 1500000:
			reqmnt();
			organ.val(`Mini. 3 Legs, One 6 Diamond in each Leg.`);
			options.filter(function(e,f){
		    		(e==1 || e <= 9)?  
		    		$(f).removeClass('nodisplay') : 
		    		$(f).addClass('nodisplay');
		    	});
			break;

		case 450000:
			reqmnt();
			organ.val(`Mini. 3 Legs, One 5 Diamond in each Leg.`);
			options.filter(function(e,f){
		    		(e==1 || e <= 8)?  
		    		$(f).removeClass('nodisplay') : 
		    		$(f).addClass('nodisplay');
		    	});
			break;

		case 225000:
			reqmnt();
			organ.val(`Mini. 2 Legs, One 5 Diamond in each Leg.`);
			options.filter(function(e,f){
		    		(e==1 || e <= 7)?  
		    		$(f).removeClass('nodisplay') : 
		    		$(f).addClass('nodisplay');
		    	});
			break;

		case 75000:
			reqmnt();
			organ.val(`Mini. 2 Legs, One 4 Diamond in each Leg.`);
			options.filter(function(e,f){
		    		(e==1 || e <= 6)?  
		    		$(f).removeClass('nodisplay') : 
		    		$(f).addClass('nodisplay');
		    	});
			break;

		case 15000:
			reqmnt();
			organ.val(`Mini. 2 Legs, One 3 Diamond in each Leg.`);
			options.filter(function(e,f){
		    		(e==1 || e <= 5)?  
		    		$(f).removeClass('nodisplay') : 
		    		$(f).addClass('nodisplay');
		    	});
			break;

		case 3600:
			reqmnt();
			organ.val(`Mini. 2 Legs, One 2 Diamond in each Leg.`);
			options.filter(function(e,f){
		    		(e==1 || e <= 4)?  
		    		$(f).removeClass('nodisplay') : 
		    		$(f).addClass('nodisplay');
		    	});
			break;

		case 1680:
			reqmnt();
			organ.val(`N/A`);
			options.filter(function(e,f){
		    		(e==1 || e <= 3)?  
		    		$(f).removeClass('nodisplay') : 
		    		$(f).addClass('nodisplay');
		    	});
			break;

		case 720:
			reqmnt();
			organ.val(`N/A`);
			options.filter(function(e,f){
		    		(e==1 || e <= 2)?  
		    		$(f).removeClass('nodisplay') : 
		    		$(f).addClass('nodisplay');
		    	});
			break;

		default:
		$('.minimumGPV').val(`Minimum Group PV Required.`);
		$('.organization').val(`Minimum Legs and Ranking Required.`);
		$('.leadership').val(``);
		rankError();
		$('#generation').val('0').trigger('change');
		errormsg.html(``);
		options.filter(function(e,f){
		    		(e==-1)?  $(f).removeClass('nodisplay') : $(f).addClass('nodisplay');
		    	});

	}
})



genInput.bind('keydown touchend', function(e) {
	$this = $(this);

	var genI = parseInt($this.val());
	$this.val(parseInt('' + genI));
	$('#development > input').val(``);
	outputRes.val(``);

	($this.attr('class').match(/\b(miniSixtyPv)\b/) && genI < 60)? 
	(()=> { 
	miniSixtyPv();   
	errorGlo();  
	})() : 
	errormsg.html(``)
	($this.attr('class').match(/\b(stockist)\b/) && genI < 100)? 
	(()=> { 
	stockError();   
	errorGlo();  
	})() : 

	($this.attr('class').match(/\b(mini10kPV)\b/) && genI < 10000)? 
	(()=> { 
	totalGPV();
	errorGlo();  
	})() : 

	($this.attr('class').match(/\b(totaldist)\b/) && genI < 3)? 
	(()=> { 
	distError();
	errorGlo();  
	})() : 

	($this.attr('class').match(/\b(monthlyPv)\b/) && genI < 30)? 
	(()=> {
	monthlyError();
	errorGlo();  
	})() : 

	($this.attr('class').match(/\b(downlinesPb)\b/) && genI < 10)? 
	downlinePB() : 

	(isNaN(genI) === true || isNaN(e.key) === true || e.keyCode === 190)?
	(()=> { 
	notNumberError(); 
	// $this.val('');
	errorGlo(); 	
	})() : 

	(()=> {
	errormsg.html(``); 
	clearErrGlo();  
	})()
		
});




breakaway.change(function() {

	breakvalue = $(this).find(':selected').data('percent');
	pvbreak = $(this).find(':selected').data('breakpv');
	(pvbreak === null || pvbreak === 'zero')? breakawayError() : errormsg.html(``);
	pvbonus = breakvalue * pvbreak;
	clearRes();

})


$('.clear').on('click', function() {
	clearRes();
});


var amount = new Intl.NumberFormat('en-US', {
			style: 'currency',
			currency: 'USD',
			minimumFractionDigits: 2
	});





calcBtn.on('click', ()=> {

	errormsg.html(``); 
	var gNums, 
		checkGroup,
		xNums,
		checkFirst,
		yNums,
		checkSecond,
		secondL,
		calc = null, 
		finalResult = null,
		noDist = null,
		monthlyM = null,
		dwlinesPB = null,
		totPvgen = null,
		stkSalesPV = null;


	gNums = [parseInt(firstGroup.val()), parseInt(secondGroup.val()), parseInt(thirdGroup.val())];
	checkGroup = ()=> {
		return (( isNaN(gNums[0]) == true || isNaN(gNums[1]) == true || isNaN(gNums[2]) == true)? true : (gNums[0] < 60 || gNums[1] < 60 || gNums[2] < 60)? true : gNums);
	}

	xNums = [parseInt(firstValue.val()), parseInt(secondValue.val()), parseInt(thirdValue.val())];
	checkFirst = ()=> {
		return (isNaN(xNums[0]) == true || isNaN(xNums[1]) == true || isNaN(xNums[2]) == true)? true : (xNums[0] < 60 || xNums[1] < 60 || xNums[2] < 60)? true : xNums;
	}

	yNums = [parseInt(fourthValue.val()), parseInt(fifthValue.val()), parseInt(sixthValue.val())];
	checkSecond = ()=> {
		return ( $('div#second').hasClass('hideElement') === false && (isNaN(yNums[0]) == true || isNaN(yNums[1]) == true || isNaN(yNums[2]) == true))? false : (yNums[0] < 60 || yNums[1] < 60 || yNums[2] < 60)? true : yNums;
	}

			noDist =  noDistributor.val();
			monthlyM =  noMonthlyPV.val();
			dwlinesPB =  downlinesPV.val();

			totPvgen = parseInt(genPV.val());
			stkSalesPV = parseInt(stockSales.val());

			var gl = fl = sl = gx = fx = sx = count = 0,
			aA = [checkGroup(), checkFirst(), checkSecond()], x,
			grnum = Math.max(aA[0][0],aA[0][1],aA[0][2]),
			fsLev = Math.max(aA[1][0],aA[1][1],aA[1][2]),
			seLev = Math.max(aA[2][0],aA[2][1],aA[2][2]);

			aA.filter((e,f,x)=> {

				(f === 0)? (e[0] === e[1] && e[1] === e[2])? gl = e[0] * 2 : 
				(()=>{ 
					for(x = 0; x < e.length; x++) {
				 	 	(e[x] === grnum)? count +=1 : 
				 	 	 gx += e[x]; 
				 	 }
				 	 (count > 1)? gl = grnum + gx : gl = gx;
				})() :

				(f === 1)? (e[0] === e[1] && e[1] === e[2])? fl = e[0] * 2 : 
				(()=>{
					count = 0;
					for(x = 0; x < e.length; x++) {
				 	 	(e[x] === fsLev)? count +=1 : 
				 	 	 fx += e[x];
				 	 } 
				 	 (count > 1)? fl = fsLev + fx : fl = fx;
				})() : 
				(f === 2)? (e[0] === e[1] && e[1] === e[2])? sl = e[0] * 2 : 
				(()=>{
					count = 0;
					for(x = 0; x < e.length; x++) {
				 	 	(e[x] === seLev)? count +=1 : 
				 	 	 sx += e[x]; 
				 	 } 
				 	 (count > 1)? sl = seLev + sx : sl = sx;
				})() : false; 
		});

			stkSales = ()=> { return (isNaN(stkSalesPV) === true)? 0 : stkSalesPV }
			globalSales = ()=> { return (isNaN(totPvgen) === true)? 0 : totPvgen }

			secondL = ()=> { return ($('div#second').hasClass('hideElement') === true)? 0 : sl * 0.10 }

			

	switch(formula) {
		case `addall`:
			(mlevel === null || mlevel === 'zero')?
			elevelError() : ((mlevel % 1 !== 0 && mlevel !== 0.01) && stkSales() < 100 )? stockError() :
			(checkGroup() === true)? miniSixtyPv() : 
			((mlevel % 1 !== 0 && mlevel === 0.01) && genPV.val() < 10000)?
			totalGPV() : (checkFirst() === true)?
			devLevelError() : (checkSecond() === false)?
			secondError() : (pvvalue === null || pvvalue === 0)?
			rankError() : (noDist < 3)? 
			distError() : (monthlyM < 30)? 
			monthlyError() : (pvbreak === null || pvbreak === 'zero')?
			breakawayError() : (dwlinesPB == 0)? 
			downlineError() : (genPercent === null || genPercent === 'zero')?
			geneError() : 

			(()=> {
				(secondL() === 0)? 
				devInput.val(`[ ${fl} PV * 10% ]`) : 
				devInput.val(`[ ${fl} PV + ${sl} PV ] * 10%`);

				$('#retail > input').val(`[ ${noDist} Persons * ${monthlyM}PV * 4.5% ]`);

				calc = ((vmlevel * gl) + (mlevel * stkSales()) + (globalSales() * 0.01) + (fl * 0.10) + secondL() + (noDist * monthlyM * 0.045 + pvbonus) + (dwlinesPB * genPercent));
				finalResult = calc * 200;
				outputRes.val(ngamount.format(finalResult));

			})();
		
		break;

		case `perform`:
			(mlevel === null || mlevel === 'zero')?
			elevelError() : ((mlevel % 1 !== 0 && mlevel !== 0.01) && stkSales() < 100 )? stockError() :
			(checkGroup() === true)?
			miniSixtyPv() : ((mlevel % 1 !== 0 && mlevel === 0.01) && genPV.val() == 0)?
			totalGPV() : 
			(()=> {
				calc = ((vmlevel * gl) + (mlevel * stkSales()) + (globalSales() * 0.01) + 0.4);
				finalResult = calc * 200;
				outputRes.val(ngamount.format(finalResult));

			})();
		break;

		case `develop`:
			(checkFirst() === true)?
			devLevelError() : (checkSecond() === false)?
			secondError() : 
			(()=> {

			(secondL() === 0)? 
				devInput.val(`[ ${fl} PV * 10% ]`) : 
				devInput.val(`[ ${fl} PV + ${sl} PV ] * 10%`);

				calc = ((fl * 0.10) + secondL());
				finalResult = calc * 200;
				outputRes.val(ngamount.format(finalResult));

			})();
		break;

		case `leader`:
			(pvvalue === null || pvvalue === 0)?
			rankError() : (dwlinesPB == 0)? 
			downlineError() : (genPercent === null || genPercent === 'zero')?
			geneError() : 

			(()=> {
				calc = (dwlinesPB * genPercent);
				finalResult = calc * 200;
				outputRes.val(ngamount.format(finalResult));
			})();
		break;

		case `retail`:
			(noDist < 3)? 
			distError() : (monthlyM < 30)? 
			monthlyError() : (pvbreak === null || pvbreak === 'zero')?
			breakawayError() : (()=> {
				calc = (noDist * monthlyM * 0.045 + pvbonus);
				finalResult = calc * 200;
				outputRes.val(ngamount.format(finalResult));
			})();
		break;

		default:
		outputRes.val('Nothing To Show');
		(formula === null || formula === 'zero')? bonusError() : errormsg.html(``);
		}



  });

/*
Advanced Calculator ends. */








/*
Max number entry for Product item number begins.
products.php */
$('[class*="item-number"]').on('keypress', function() {
	$this = $(this)
	return $this.val().length < 3;
	($this.val().length >= 3)? (()=>{ 
	$this.val() = $this.val().slice(0,3)
	})() : console.log('');
});
/**Max number entry for Product item number ends**/



/*
Email textarea Character Input Counter begins.
email-us.php */
(()=>{
var counter = 0,
result = $('.count'), x, $this;
result.text(counter);
$('#email-us').add('#text-areaf').add('#into_bio').on('keyup', function(){
	$this = $(this).val().trim();
	for(x = 0; x <= $this.length; x++) {
		result.text(x);
	}		
});
})();
/*
Email textarea Character Input Counter ends. */



/*
Home page small calculator Func begins.
index.php */
let smallCalcBtn = $("#smallCalcBtn"),
	calcResult = $(".result"),
	finalBonus,
	globalsal,
	digitPercent;

$("#packages").on("change", function(){
	clearCssShadow();
	calcResult.val('');
	let commission = $(".commission");
	Exvalue = $(this).find(':selected').attr("value");
	$("#Calcmsg").text("");
if(Exvalue == "") {
	calcResult.val('');
	clearCssShadow();
	$("#Calcmsg").text("Please select your entry level");
	$("#Calcmsg").addClass("calcErr");
} 
else if (Exvalue != ""){
	$("#Calcmsg").removeClass("calcErr");
	$("#Calcmsg").text("");
}

digitPercent = parseFloat($(this).find(':selected').data("percent"));
globalsal = parseFloat($(this).find(':selected').data("gsales"));
percent = digitPercent * 100;

if(globalsal == '0.06'){
commission.val(Math.ceil(percent) + '% Ref Bonus' + ' + 6% Group sales');
}
else if(globalsal == '0.04'){
commission.val(Math.ceil(percent) + '% Ref Bonus' + ' + 4% Group sales');
}
else if(digitPercent == '0.12' && (Exvalue == '750,000')) {
commission.val(Math.ceil(percent) + '% pv' + ' + 1% Group sales');
} else {
commission.val(Math.ceil(percent) + "%");
}	

selectRefFunc(digitPercent, globalsal);
});

let totalref = $(".totalref");
function selectRefFunc() {
let refPvalue;
$("#referrals").on("change", function() { 
calcResult.val('');
clearCssShadow();
refregAmnt = $(this).find(':selected').attr("value");
refPvalue = $(this).find(":selected").data("refval");

if(refregAmnt == "") {
	$("#Calcmsg").text("Referral level required!");
	$("#Calcmsg").addClass("calcErr");
} 
else if (refregAmnt !== "") {
	$("#Calcmsg").removeClass("calcErr");
	$("#Calcmsg").text("");
}

smallCalcBtn.click(function() {	
// clickCalcBtn();
noRemainder =  (totalref.val() / 3);
let finalPV = (digitPercent * refPvalue * noRemainder * 2);

let convertedNum = parseInt('' + totalref.val());
totalref.val(convertedNum);

if(totalref.val() == 0) {
$("#Calcmsg").text("Minimum of 3 Referrals required!");
$("#Calcmsg").addClass("calcErr");
calcResult.val('');
} 
else if(refPvalue == "") {
$("#Calcmsg").text("Referral level required!");
$("#Calcmsg").addClass("calcErr");
}
else if(convertedNum === 1 || convertedNum === 2) {
$("#Calcmsg").text("3 Referrals and above required!");
$("#Calcmsg").addClass("calcErr");
calcResult.val('');
}
else if(digitPercent === ''){
// calcResult.val('0');
// $("#Calcmsg").addClass("calcErr");
}			
else {

$("#Calcmsg").text("");
$("#Calcmsg").removeClass("calcErr");

totalref.keyup(function(){

if(totalref.val() !== 0) {
calcResult.val('');
}
clearCssShadow();
});

if (globalsal == '0.06') {
	finalBonus = ngamount.format(finalPV * 200);
	calcResult.val(finalBonus);
}	
else if(globalsal == '0.04') {
	finalBonus = ngamount.format(finalPV * 200);
	calcResult.val(finalBonus);
}
else if(globalsal == '0.01') {
	finalBonus = ngamount.format(finalPV * 200);
	calcResult.val(finalBonus);
}
else {
	finalBonus = ngamount.format(finalPV * 200);
	calcResult.val(finalBonus);
}
calcResult.css({
'-webkit-box-shadow':'0px 0px 10px 0px #f42a30',
'-moz-box-shadow':'0px 0px 10px 0px #f42a30',
'box-shadow':'0px 0px 10px 0px #f42a30'
});
}

});

});		
}
selectRefFunc();

smallCalcBtn.click(function(){
if($("#packages").val() == '0'){
		$("#Calcmsg").text("Please select your entry level");
		$("#Calcmsg").addClass("calcErr");
		calcResult.val('0');
		clearCssShadow();
	}
	else if($("#referrals").val() == ""){
		$("#Calcmsg").text("Referral level required!");	
		$("#Calcmsg").show();	
		$("#Calcmsg").addClass("calcErr");		
	}
});

function clearCssShadow() {
calcResult.css('box-shadow','none');
}



var transition = $('.forum-inner .transition'),
    list = $('.forum-inner div.carouselitems'),
    listItem = $('.forum-inner div.carouselitems div'),
	listWidth = list.width(),
	listLength = listItem.length,
	randomNum,
	autoSlider,
	intervFunc,
	transWidth = listWidth / listLength;
	listcounter = 0;

	autoSlider = ()=> {
		if(listcounter > listLength - 1) {
			listcounter = 0;
			list.css({ 
				'transform':'translateX('+ (-transWidth * listcounter) +'px)', 
				'transition' : '0s',
			});
			return false;
		}
		list.css({ 
			'transform':'translateX('+ (-transWidth * listcounter) +'px)',
			'transition' : 'all 1.5s linear'
		});
		listcounter++;
}
setInterval(autoSlider, 1500);



//## video carousel forum. /
var counter = 0,
vcount,
videoCount = $('span.video-count'),
frame = $('#taglist div.carousel'),
listWrapper = $('#taglist .list-wrapper'),
carouselWidth = frame.width(),
videotag = $('#taglist div.iframe').find('video.v-tag'),
frameLength = $('#taglist div.iframe').length,
slideWidth = carouselWidth / frameLength;
videoCount.text('VIDEOS [ '+ (counter + 1) +' of ' + frameLength + ' ]');

$('.video-slide').each(function(e, f) {
	$(this).on('click', ()=> {
		if(e === 0) {
			counter--;
			if(counter <  0) {
				counter = frameLength - 1;
				frame.css({ 'transform':'translateX('+ (-slideWidth * counter) +'px)' });
			}
			frame.css({ 'transform':'translateX('+ (-slideWidth * counter) +'px)' });
			$(videotag).each(function(ind, elem) {
				$(this).trigger('pause');
			});
		}
		else {
			counter++;
			frame.css({ 'transform':'translateX('+ (-slideWidth * counter) +'px)' });
			if(counter > frameLength - 1) {
				counter = 0;
				frame.css({ 'transform':'translateX('+ (-slideWidth * counter) +'px)' });
			}	
			$(videotag).each(function(ind, elem) {
				$(this).trigger('pause');
			});
		}
		vcount = counter;
		videoCount.text('VIDEOS [ '+ (vcount + 1) +' of ' + frameLength + ' ]');
	});

	
});
/*=== FORUM SCRIPT forum.php ends 
==*/














/*== 
File upload preview for 
profile.php and forum forum.php begins. 
==*/


var imagepreview = (elem)=> {
$(elem).change(function(e) {
var input = e.target;
if (input.files && input.files[0]) {
var file = input.files[0];
var reader = new FileReader();
reader.readAsDataURL(file);
	reader.onload = (e)=> {	
		$('.upload-error').html('');

		$('#previewImg').css({
			'display':'flex',
			'background-image':'url(' + reader.result + ')' }
		);
		$('.image-wrapper').css({
			'background-image':'none',
			'border':'none',
			'background': 'transparent'
		});
	$('.remove-image').on('click', ()=> {
		$(input).val('');
		upFileDataURL = null;
		$('#previewImg').css('display', 'none');
	});			
	}
  }
	});
}
imagepreview("#post-image") // Forum.php;
imagepreview('#fileUploadElem'); // Profile.php profile picture;


/* Document Upload registeration and contact us page begins. */
var attcEmailFile = null,
	fileName;
var docupload = (actelement)=> {
$(actelement).change(function(e) {
	var $this = $(this),
		input = e.target;
	if (input.files && input.files[0]) {
		var filex = input.files[0],
		fileSize = input.files[0].size;
		fileName = input.files[0].name;
		reader = new FileReader();	
		reader.readAsDataURL(filex);
		reader.onload = function(ev) {

			if(parseInt(fileSize/1000) > 5000) {

				if($this.hasClass('toque')) {
					  errFunc(imgUpload, 24);
				}
				$('.fa-file-upload').css('display', 'block');
				$('.fa-check').css('display', 'none');
				(function() {
					$('.email-us-file span').text(' Upload');
					$('.email-us-file').css({
						'width': '5.5em',
						'color': '#f22c3b',
						'border': '0.1em dashed #f22c3b'
					});

					$('.email-error').html('<div class="display">Image size is larger than 5 MB. Maximum allowed size is 5 MB.</div>');
				})();
				return false;
			} else {
				attcEmailFile = reader.result;

				if($this.hasClass('regInput')) {
					noerrb(imgUpload);
				}
				(function() {
					$('.email-us-file span').text(' Selected ');
					$('.email-us-file').css({
						'width': '6.2em',
						'color': '#747480',
						'border': '0.1em dashed #9b9ba8'
					});
					$('.email-us-file').attr('title', fileName);
					$('.email-error').html('');
				})();
				$('.fa-file-upload').add('.fa-cloud-upload-alt').css('display', 'none');
				$('.fa-check').css('display', 'block');
				$('.image-upload').attr('title', fileName);
			}
		}
	}
});
}
docupload('#doc-upload');  //Sign up page...
docupload('#mail-file'); // Email us page...



const emailusRegExp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


$('#emailus form').on('submit', function(e) {
	e.preventDefault();
	var emName = $('.sname').val(),
		emEmail = $('.semail').val(),
		emMessage = $('#email-us').val(),
		emailusPara = {
			"userName": emName,
			"userEmail": emEmail,
			"userMessg": emMessage,
			"attchName": fileName,
			"attachFile": attcEmailFile,
			"sendEmail": "userEmailus",
		}
	if($('.sname').val() != '' && $('.semail').val() != '' && $('#email-us').val().trim().length > 1 && emailusRegExp.test($('.semail').val())) {
		
		$.ajax({
			url: "email-us.php",
			method: "POST",
			data: emailusPara,
			cache: false,
			beforeSend: function() {
				$('.spinner-container').css({
					'display': 'flex',
					'justify-content': 'center',
					'align-items': 'center'
				});
			},
			success: function(respond, status, xhr) {
				
				if(status == 'success') {
					$('.email-us-form').html('');
					$('.spinner-container').css('display', 'none');
					$('#emailus').html('<div class="email-success">Thank you for contacting us. Please be patient, our customer\'s service will respond to you as soon as possible. <br /><br /> <a href="forum"><button type="button">Forum</button></a> <a href="help"><button type="button">Help</button></a> </div>');
				}
			}
		})
	}
	else {

		$('#emailus .email-error').html('<div class="display">Please enter all values and correct email address in required field(s).</div>');
	}

$('[class*="inputc"]').on('keyup', function() {
	$(this).each(function(i, e) {
		if($(e).val() !== '') {
			$('#emailus .email-error').html('');
		}
	});
});
	
});



var spin
spinnerLoader = ()=> {
spin = setTimeout(showPage, 2000);
}
const showPage = ()=> {
$("#loader").css(
	'display', 'none');
}



/*======================
Modal for 
> home page, 
> Benefit page, 
and Profile page =====*/

var bvm = $('.u-modal'),
target = $('[class*="target"]');
var player;

function modal(argument){
	var id = $('a[class="bonus-system"]').data('youtube-id');

$(argument).on('click', (e)=> {
	($(e.target).attr('class').match(/\b(show-button|content|exception)\b/))?
		(()=>{
			bvm.add($('body')).addClass('display noscroll');
			var auto = '?autoplay=1';
			var reNumber = '&rel=0';
			var src = 'https://www.youtube.com/embed/'+id+auto+reNumber;
			$('#youtube').attr('src', src);
		})()
		:
		(()=> {
			bvm.add($('body')).removeClass('display noscroll');
			$('#youtube').attr('src', '');
			$('.third-inner-modal').css('display','none');
		})();
});
}
modal(target);



$(function() {
	var $elements = $('.animatedDiv.notAnimated'),
	$window = $(window);
$window.on('scroll', function(e) {
	$elements.each(function(i, elem) { 
	if ($(this).hasClass('animated')) 
		return;
		animateMe($(this));
	});
});
});
function animateMe(elem) {
	var winTop = $(window).scrollTop(),
	winBottom = winTop + $(window).height(),
	elemTop = $(elem).offset().top,
	elemBottom = elemTop + $(elem).height() - 190;
	if ((elemBottom <= winBottom) && (elemTop >= winTop)) {
	$(elem).removeClass('notAnimated').addClass('animated');
	}
}


(function() {

$(function() {
	var toggle;
	return toggle = new Toggle('.togglex');
});
this.Toggle = (function() {
	Toggle.prototype.el = null;
	Toggle.prototype.tabs = null;
	Toggle.prototype.tabsm = null;
	Toggle.prototype.panels = null;

function Toggle(toggleClass) {

	this.el = $(toggleClass);
	this.tabs = this.el.find(".tabx");
	this.tabsm = this.el.find("i.smalltab");
	this.panels = this.el.find(".panel");
	this.bind();
}
Toggle.prototype.show = function(index) {
	var activePanel, activeTab, activeTabsm, readPara, 
	msgUserId, refByuc, unreadMsg, unreadRef, readStatus = '1';
	this.tabs.removeClass('active');
	this.tabsm.removeClass('active');
	activeTab = this.tabs.get(index);
	activeTabsm = this.tabsm.get(index);
	$(activeTab).addClass('active');
	$(activeTabsm).addClass('active');
	msgUserId = $(activeTab).find(".alert").data('userid');
	refByuc = $(activeTab).find(".alert").data('refbyuc');
	unreadMsg = $(activeTab).find(".alert").data('unreadm');
	unreadRef = $(activeTab).find(".alert").data('unreadrefe');
	this.panels.hide();
	activePanel = this.panels.get(index);

	readPara = {
		"msgUserId": msgUserId,
		"refByuc": refByuc,
		"unreadMsg": unreadMsg,
		"unreadRef": unreadRef,
		"readStatus": readStatus,
		"sendStatusp": "postStatus"
	}	
	
	if(msgUserId != '' && refByuc != '') {
		
		$.ajax({
			url: "cnumFunc.php",
			method: "POST",
			data: readPara,
			cache: false,
			success: function(response, status, xhr) {

				if(status == 'success') {
					$(activeTab).find(".alert").hide();
				}
			}
		});
	}
	return $(activePanel).show();
};
Toggle.prototype.bind = function() {
var _this = this;
return this.tabs.unbind('click').bind('click', function(e) {
return _this.show($(e.currentTarget).index());
});
};
return Toggle;
})();

}).call(this);

/*==== Tab function ends ====*/

$('#clipBtn').click(function() {
	$('.readonly-input').select();
	document.execCommand("copy");
	// $('span.profileTooltip').text('Link Copied');
	console.log('Link copied');
});


var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0');
var yyyy = today.getFullYear();
today = dd + '/' + mm + '/' + yyyy;
$('#displayLogin').text(today);



/*==
Reg & Log In page.
Show password function begins */

var passInput = $('.reg-password');
$('.showPass').on('click', function() {
	$(this).toggleClass('fa-eye fa-eye-slash');
	if(passInput.attr('type') == 'password') {
		passInput.attr('type','text');
	} else {
		passInput.attr('type','password');
	}
});
/*==
Show password function ends */


var emailPhno = $("#emailPhone"),
lgnpass = $("#loginPass"),
error = $("#bug_msg"),
lgSubInput = $('[class*="reqlogInput"]'),
loginDelay,
loginErr,
logErrFunc,
logForm,
noerrb;

loginDelay = ()=> {
$('#login-modal').css('display', 'block');
$('#login-disable').css({
	'background': '#d4d7db',
	'cursor': 'not-allowed',
	'color': '#4d5157'
}).attr('disabled', 'disabled');
}

loginErr = [
	'Please enter all require fields',
	'Your email or phone number is required.',
	'Please enter a valid email address.',	
	'Please enter a valid phone number.',
	'Error!, Password field is required.',
	'Password must be min. of 8 charachters.',
	'Password entered is weak.'
];

logErrFunc = (elem, errIndex)=> {
	// $(elem).css('border', '1.1px solid #ff0000');
	error.html('<div class="error_msg">'+loginErr[errIndex]+'</div>');
	return false;
}

noerrb = (noelem)=> {
	$(noelem).css('border', '1.1px solid #969ea3');
	error.html('');
	return true;
};


$("#login-form").on("submit", (e)=> {
 	e.preventDefault();
 	logForm = $('#login-form')[0];
 	const emailRegExp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	const phoneNumRegExp = /^[0-9]{5,11}$/g;
	const passRegExp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/g;
 	
 	(emailPhno.val() === '' && lgnpass.val() === '')?
 			logErrFunc(lgSubInput, 0) :
 		(emailPhno.val() === '')?
 			logErrFunc(emailPhno, 1) :
 		(isNaN(emailPhno.val()) === true && !emailRegExp.test(emailPhno.val()))?
 			logErrFunc(lgnpass, 2) :
 		(isNaN(emailPhno.val()) === false && !phoneNumRegExp.test(emailPhno.val()))?
 			logErrFunc(lgnpass, 3) :
 		(lgnpass.val() === '')?
 			logErrFunc(lgnpass, 4) :
 		(lgnpass.val().length < 8)?
 			logErrFunc(lgnpass, 5) :
 		(!passRegExp.test(lgnpass.val()))?
 			logErrFunc(lgnpass, 6) :
 		(()=> {
 			noerrb();
 			loginDelay();
	 		$(logForm).unbind('submit').submit();
 		})();

});
/* Login Validation login page ends */

/* Remove cart info after action. product.php */
function removeDelaction() {
	$("div.cart-action-info").html('');
}


//#Report profile.php.
$('#report-user').on('click', function() {
	var reportState = null,
		reporterId = $(this).siblings('input.reporterid').val();
		reporterUc = $(this).siblings('input.reporteruc').val();
		offenderId = $(this).siblings('input.offenderid').val();
		offenderUc = $(this).siblings('input.offenderuc').val();

	if($(this).text() == "Report") {
		$(this).html("Reported <i class='fas fa-check'></i>").css("color", "#e6424f").attr('title', 'Undo report');
		reportState = 1;
	}
	else {
		$(this).text("Report").css("color", "#767a7e").attr('title', 'Report user');
	}
	var reportPara = {
		"reportState": reportState,
		"reporteruId": reporterId,
		"reporteruUc": reporterUc,
		"offenderuId": offenderId,
		"offenderUuc": offenderUc,
		"reportCond": "setReport"
	}

	$.ajax({
		url: 'cnumFunc.php',
		method: 'POST',
		data: reportPara,
		cache: false
	});
});
// #Report profile.php ends.


function paymentBFunc(g) {
	$('.payment-details').css('display', 'none');
	$('label.top-tab').css('background', '#fff');
	$(g).css("background", "#e7e8ef");
}

function paymentMFunc(g) {
	$('.enter-details').css('display', 'none');
	$('label.enter-tab').css('background', '#fff');
	$(g).css("background", "#e7e8ef");
}

function paymentXFunc(g) {
	$('.payment-panel.confirm').css('display', 'none');
	$('label.confirm').css('background', '#fff');
	$(g).css("background", "#e7e8ef");
}

$('.payment-status label.general').each(function(k, g) {
	$(this).on('click', function() {
		$('.payment-panel .bug_msg').html('');
		$('.payment-status').find('input').val('');
		if(k == 0) {
			paymentBFunc(g);
			$('.deposit-d').css('display', 'block');
		}
		else if(k == 1) {
			paymentBFunc(g);
			$('.check-p').css('display', 'block');
		}
		else if(k == 2) {
			paymentMFunc(g);
			$('.cash-deposit.enter-details').css('display', 'block');
		}
		else if(k == 3) {
			paymentMFunc(g);
			$('.transfer-payment.enter-details').css('display', 'block');
		}
		else if(k == 4) {
			paymentXFunc(g);
			$('.confirm.cash-deposit').css('display', 'block');
		}
		else if(k == 5) {
			paymentXFunc(g);
			$('.confirm.transfer-payment').css('display', 'block');
		}		
	});
});



function spinnerFunc() {
	$('.payment-status .processing, .payment-status #pspinner, .payment-status #lpspinner, #lpspinner.spin, #pspinner.spin').css({
		'display': 'flex',
		'justify-content': 'center',
		'align-content': 'center'
	});
}


$('form.payment-status').bind('keypress submit', function(e) {
	if(e.keyCode == 13 || e.key == 'Enter') {
		e.preventDefault();
		e.stopImmediatePropagation();
	}
});

$('form.payment-status').on('submit', function(e) {
	e.preventDefault();
	
	if($(e.originalEvent.submitter).hasClass('rdeposit') === true) {
		console.log(e.originalEvent.submitter);
		if($('#depositor').val() === '' || $('#teller-no').val() === '' || $('#payment-date').val() === '' || $('#amount-paid').val() === '') {
			$('.payment-panel .bug_msg').html('<span class="error_msg">Error! please enter all details in deposit slip to register your payment.</span>');
		} 
		else {
			var depositPara = {
				"regDepName": $('#depositor').val(),
				"regTellerNo": $('#teller-no').val(),
				"regPayDate": $('#payment-date').val(),
				"regAmtDepos": $('#amount-paid').val(),
				"confirmPayment": "regDeposit"
			}
			$.ajax({
				url: "pstatus.php",
				method: "POST",
				data: depositPara,
				cache: false,
				beforeSend: function() {
					spinnerFunc();
				},
				success: function(response, status) {
					if(status === 'success') {
						$('.deposit-d fieldset').html(response);
						console.log(response);

						$('.payment-status .processing').css('display', 'none');
					}
				},
				error: function() {
					$('.payment-status fieldset').html('<div class="msg-failed"><span class="error_msg"> System error! Message failed to send! Please login your payment details and try again.</span></div>');
				}
			});
		}
	}

	if($(e.originalEvent.submitter).hasClass('rtransfer')) {
		console.log(e.originalEvent.submitter);
		if($('#account-name').val() === '' || $('#transfer-date').val() === '' || $('#amount-transf').val() === '') {
			$('.payment-panel .bug_msg').html('<span class="error_msg">Error! please enter all transfer details to register your payment.</span>');	
		} 
		else {
			var transferPara = {
				"transfName": $('#account-name').val(),
				"transfDate": $('#transfer-date').val(),
				"amountTransf": $('#amount-transf').val(),
				"confirmPayment": "regTransfer"
			}
			$.ajax({
				url: "pstatus.php",
				method: "POST",
				data: transferPara,
				cache: false,
				beforeSend: function() {
					spinnerFunc();
				},
				success: function(response, status) {
					if(status === 'success') {
						$('.payment-status .processing').css('display', 'none');
						$('.deposit-d fieldset').html(response);
						console.log(response);
					}
				},
				error: function() {
					$('.payment-status fieldset').html('<div class="msg-failed"><span class="error_msg"> System error! Message failed to send! Please login your payment details and try again.</span></div>');
				}
			});
		}
	}

	
	if($(e.originalEvent.submitter).hasClass('cdeposit')) {
		console.log(e.originalEvent.submitter);

		if($('#cdepositor').val() === '' || $('#cteller-no').val() === '' || $('#cpayment-date').val() === '' || $('#camount-paid').val() === '') {
			
			$('.payment-panel .bug_msg').html('<span class="error_msg">Error! please fill in all deposit details to check the status of your payment.</span>');
		}
		else {
			var depositPara = {
				"depositName": $('#cdepositor').val(),
				"tellerNo": $('#cteller-no').val(),
				"paymentDate": $('#cpayment-date').val(),
				"amountDeposit": $('#camount-paid').val(),
				"confirmPayment": "cdeposit"
			}
			$.ajax({
				url: "pstatus.php",
				method: "POST",
				data: depositPara,
				cache: false,
				beforeSend: function() {
					spinnerFunc();
				},
				success: function(response, status) {
					if(status === 'success') {
						$('.payment-status fieldset').html(response);
						$('.payment-status .processing').css('display', 'none');
					}
				},
				error: function() {
					$('.payment-status fieldset').html('<div class="msg-failed"><span class="error_msg"> System error! Message failed to send! Please login your payment details and try again.</span></div>');
				}
			});
		}
	}

	if($(e.originalEvent.submitter).hasClass('ctransfer')) {
		console.log(e.originalEvent.submitter);

		if($('#caccount-name').val() === '' || $('#ctransfer-date').val() === '' || $('#camount-transf').val() === '') {
			$('.payment-panel .bug_msg').html('<span class="error_msg">Error! please fill in all transfer details to check the status of your payment.</span>');	
		}
		else {
			var transferPara = {
				"transfName": $('#caccount-name').val(),
				"transfDate": $('#ctransfer-date').val(),
				"amountTransf": $('#camount-transf').val(),
				"confirmPayment": "ctransfer"
			}
			$.ajax({
				url: "pstatus.php",
				method: "POST",
				data: transferPara,
				cache: false,
				beforeSend: function() {
					spinnerFunc();
				},
				success: function(response, status) {
					if(status === 'success') {
						$('.payment-status .processing').css('display', 'none');
						$('.payment-status fieldset').html(response);
					}
				},
				error: function() {
					$('.payment-status fieldset').html('<div class="msg-failed"><span class="error_msg"> System error! Message failed to send! Please login your payment details and try again.</span></div>');
				}
			});
			
		  }
		}
});





$('.payment-status input[type="number"]').on('keypress', function() {
	$this = $(this);
	return $this.val().length < 20;
	($this.val().length >= 20)? (()=>{ 
	$this.val($this.val().slice(0,20));
	})() : console.log('');
});





