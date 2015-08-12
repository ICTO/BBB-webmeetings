<footer>
	<div class="container">
		<p>Contact: <b>ICTO</b></p>
		<ul class="language-bar-switcher">
			<li><i class="fa fa-language fa-2x"></i></li>
			@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
				<li>
					<a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
						{{{ $properties['native'] }}}
					</a>
				</li>
			@endforeach
		</ul>
		<address>
			<ul class="company-social">
				<li class="social-facebook"><a href="https://www.facebook.com/minerva.ugent" target="_blank"><i class="fa fa-facebook"></i></a></li>
				<li class="social-github"><a href="https://github.com/ICTO/BBB-webmeetings" target="_blank"><i class="fa fa-github"></i></a></li>
			</ul>
		</address>
	</div>
</footer>