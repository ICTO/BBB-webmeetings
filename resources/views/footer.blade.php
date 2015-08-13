<footer>
	<div class="container-fluid">
		<div class="col-md-6">
			<ul class="language-bar-switcher">
				<li><i class="fa fa-language fa-2x"></i></li>
				@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
					<li>
						<a rel="alternate" {{ (LaravelLocalization::getCurrentLocale() === $localeCode) ? 'class=active' : '' }} hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
							{{{ $properties['native'] }}}
						</a>
					</li>
				@endforeach
			</ul>
			<div class="contact">
				Contact: <b><a href="mailto:icto@ugent.be?Subject=Webmeeting">Icto</a></b>
			</div>
		</div>
		<div class="col-md-6">
			<address>
				<ul class="company-social">
					<li class="social-facebook">
						<a href="https://www.facebook.com/minerva.ugent" target="_blank">
								<i class="fa fa-facebook fa-4x"></i>
						</a>
					</li>
					<li class="social-github">
						<a href="https://github.com/ICTO/BBB-webmeetings" target="_blank">
							<i class="fa fa-github fa-4x"></i>
						</a>
					</li>
				</ul>
			</address>
		</div>
	</div>
</footer>