$(window).scroll( ->
  if ($(".navbar").offset().top > 50)
    $(".navbar-fixed-top").addClass("top-nav-collapse")
  else
    $(".navbar-fixed-top").removeClass("top-nav-collapse")
)