var results = 0;

var review_from = {0: 'internal', 1: 'yelp', 2: 'google'};

var search = function (event, appendOnly = false){
	
	if(!appendOnly){
		results = 0;
		clearReviews();
	}
	
	var noOfReviews = NO_OF_REVIEWS;
	var internal = $("#internal_on").prop('checked') ? 1 : 0;
	var yelp =     $("#yelp_on").prop('checked') ? 1 : 0;
	var google =   $("#google_on").prop('checked') ? 1 : 0;
	var offset = results;
	var threshold = $("#star_threshold").val();

	
	$.ajax({
		url: "ajax.php",
		method: "GET",
		dataType:"json",
		data: {
			noOfReviews,
			internal,
			yelp,
			google,
			offset,
			threshold
		},
		success: function(response){
			if(!appendOnly){
				showResults(response);
			}else{
				appendReviews(response.reviews);
			}
		},
		error:function(xhr, ajaxOptions, thrownError){
			console.warn("something went wrong");
			console.warn(ajaxOptions);
			console.warn(thrownError);
		}
	});
}

function searchMore(){
	console.warn("searching for more");
	search(null, true);
}

function showResults(resp){
	$("#bis_info").html("");
	$("#reviews").html("");
	
	$("#bis_info").append("<div class='businessName'>" + resp.business_info.business_name + "</div>");
	$("#bis_info").append("<div class='businessAddress'>" + resp.business_info.business_address + "</div>");
	$("#bis_info").append("<div class='businessPhone'>" + resp.business_info.business_phone + "</div>");
	$("#bis_info").append("<div class='businessUrl'><a href=\"" + resp.business_info.external_page_url + "\">" + resp.business_info.external_page_url + "</a></div>");
	$("#bis_info").append("<div class='businessReviewUrl'><a href=\"" + resp.business_info.external_url + "\">" + resp.business_info.external_url + "</div>");

	appendReviews(resp.reviews);
}

function clearReviews(){
	$("#reviews").html("");
}

function appendReviews(revs){
	for(var r in revs){
		results += 1;
		var review = revs[r];
		
		var row = $(document.createElement("div"));
		row.attr({class:'row'});
		
		var stars = $(document.createElement("div"));
		//stars.attr({class:'col-sm-4'});
		stars.append("<input class=\"rating-loading />");
		row.append(stars);
		stars.rating({displayOnly: true, stars:5, step:1, disabled:true});
		stars.rating("update", review.rating); //wont take value directly
		
		row.append("<div class=\"col-sm-4\" ><a href=\""+review.customer_url+"\">" + review.customer_name + "</a></div>");
		row.append("<div class=\"col-sm-4\" >" + review.date_of_submission + "</div>");
		row.append("<div class=\"col-sm-4\" >Source:" + review_from[review.review_from] + "</div>");
		row.append("<br><p>" + review.description + "</p>");
		$("#reviews").append(row);
		//$(".arating").rating();
	}
	//$(".ratings").rating();
}

$(document).on('ready', function(){
	$('#homeButton').on('click', search);
	$('#aboutButton').on('click', function(){document.location.href="/";});
	$("#star_threshold").rating();
	$("#star_threshold").on('change', search);
	$(":checkbox").on('change', search);
	search();
	var block = false;
	$(window).scroll(function() {
		if($(window).scrollTop() + $(window).height() == $(document).height()){
			if(!block){
				
				block = true;
				//$('#loader').show();
				setTimeout(function(){ 
					//$('#loader').hide();
					searchMore();
					block = false;
				}, 500);
			}
			
		}
	});
	
});