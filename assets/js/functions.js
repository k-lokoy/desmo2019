( function( window, document ) {
  
  const html           = document.querySelector( 'html' )
  const main           = document.getElementById('site-main')
  const archiveTitle   = html.querySelector('.archive .page-header h1')
  const videos         = html.querySelectorAll( '.format-video iframe, .format-video object, .format-video embed' )
  const scrollToTop    = html.querySelector( '#scroll-to-top' )
  const anchoredImages = html.querySelectorAll('a img')

  // Replace no-js class with js on html element
  html.classList.remove( 'no-js' )
  html.classList.add( 'js' )


  // Remove prefix from archive titles
  if ( archiveTitle ) {
    const archiveTitleArr = archiveTitle.innerHTML.split(': ')
  
    if ( archiveTitleArr.length > 1 ) {
      archiveTitleArr.shift()
      archiveTitle.innerHTML = archiveTitleArr.join(': ')
    }
  }

  // Force videos 16:9 aspect ratio
  function sizeVideos() {
    videos.forEach( function(video) {
      video.style.height = Math.floor( video.offsetWidth / 16 * 9 ) + 'px'
    } )
  }

  sizeVideos()

  window.addEventListener( 'resize', function() {
    sizeVideos()
  } )

  // Scroll to top
  window.addEventListener( 'scroll', function() {
    scrollToTop.style.bottom = window.scrollY > 500 ? '20px' : '-2000px'
  } )

  main.addEventListener( 'scroll', function() {
    scrollToTop.style.bottom = main.scrollTop > 500 ? '20px' : '-2000px'
  } )


  scrollToTop.addEventListener( 'click', function(event) {
    event.preventDefault()
    window.scrollTo( { top: 0, behavior: 'smooth' } )
    main.scrollTo( { top: 0, behavior: 'smooth' } )
  } )

  // Remove hover animation from anchored images
  anchoredImages.forEach(img => {
    img.parentElement.classList.add('ignore-animation')
  })


} ) ( typeof window != 'undefined' ? window : this, document )