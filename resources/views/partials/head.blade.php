<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Browse beautiful photos in our Sunflower Photo Gallery. A collection of stunning images curated for your enjoyment.">

<title>{{ $title ?? config('app.name') }}</title>

<link rel="icon" href="/assets/sunflower.svg" type="image/svg+xml">

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
