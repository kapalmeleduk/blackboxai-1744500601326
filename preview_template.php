<?php
// Get template selection and demo data
$template = filter_input(INPUT_GET, 'template', FILTER_SANITIZE_STRING);
$demo_data = [
    'nama_pria' => filter_input(INPUT_POST, 'nama_pria', FILTER_SANITIZE_STRING),
    'nama_wanita' => filter_input(INPUT_POST, 'nama_wanita', FILTER_SANITIZE_STRING),
    'tanggal' => filter_input(INPUT_POST, 'tanggal', FILTER_SANITIZE_STRING),
    'lokasi' => filter_input(INPUT_POST, 'lokasi', FILTER_SANITIZE_STRING),
    'foto' => filter_input(INPUT_POST, 'foto', FILTER_SANITIZE_URL),
    // Demo data for additional fields
    'nama_ayah_pria' => 'Mr. John Doe Sr.',
    'nama_ibu_pria' => 'Mrs. Jane Doe',
    'nama_ayah_wanita' => 'Mr. Robert Smith',
    'nama_ibu_wanita' => 'Mrs. Mary Smith',
    'ceremony_time' => '10:00',
    'reception_time' => '12:00',
    'dinner_time' => '18:00',
    'quote_text' => 'Love is patient, love is kind.',
    'quote_author' => '1 Corinthians 13:4'
];

// Format the date
$date = new DateTime($demo_data['tanggal']);
$formatted_date = $date->format('d F Y');

// Create invitation array to match the structure expected by templates
$invitation = [
    'nama_pria' => $demo_data['nama_pria'],
    'nama_wanita' => $demo_data['nama_wanita'],
    'nama_ayah_pria' => $demo_data['nama_ayah_pria'],
    'nama_ibu_pria' => $demo_data['nama_ibu_pria'],
    'nama_ayah_wanita' => $demo_data['nama_ayah_wanita'],
    'nama_ibu_wanita' => $demo_data['nama_ibu_wanita'],
    'tanggal' => $demo_data['tanggal'],
    'ceremony_time' => $demo_data['ceremony_time'],
    'reception_time' => $demo_data['reception_time'],
    'dinner_time' => $demo_data['dinner_time'],
    'lokasi' => $demo_data['lokasi'],
    'foto' => $demo_data['foto'],
    'quote_text' => $demo_data['quote_text'],
    'quote_author' => $demo_data['quote_author']
];

// Demo gallery images
$gallery_images = [
    [
        'image_url' => 'https://images.pexels.com/photos/1024993/pexels-photo-1024993.jpeg',
        'caption' => 'Our First Date'
    ],
    [
        'image_url' => 'https://images.pexels.com/photos/1139784/pexels-photo-1139784.jpeg',
        'caption' => 'The Proposal'
    ],
    [
        'image_url' => 'https://images.pexels.com/photos/1589216/pexels-photo-1589216.jpeg',
        'caption' => 'Engagement Day'
    ]
];

// Demo love story
$love_story = [
    [
        'judul' => 'First Meet',
        'deskripsi' => 'We first met at a coffee shop on a rainy Sunday morning.',
        'tanggal' => '2022-01-15',
        'icon' => 'fa-heart'
    ],
    [
        'judul' => 'First Date',
        'deskripsi' => 'Our first official date was at the local park.',
        'tanggal' => '2022-02-14',
        'icon' => 'fa-coffee'
    ],
    [
        'judul' => 'The Proposal',
        'deskripsi' => 'He proposed during sunset at our favorite beach.',
        'tanggal' => '2023-12-25',
        'icon' => 'fa-ring'
    ]
];

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Template</title>
    
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>💑</text></svg>">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Common Styles -->
    <link rel="stylesheet" href="assets/css/common/base.css">
    <link rel="stylesheet" href="assets/css/common/utilities.css">
    <link rel="stylesheet" href="assets/css/common/animations.css">

    <!-- Component Styles -->
    <link rel="stylesheet" href="assets/css/components/gallery.css">
    <link rel="stylesheet" href="assets/css/components/countdown.css">
    <link rel="stylesheet" href="assets/css/components/forms.css">

    <!-- Template Styles -->
    <link rel="stylesheet" href="assets/css/templates/elegant.css">
    <link rel="stylesheet" href="assets/css/templates/rustic.css">
    <link rel="stylesheet" href="assets/css/templates/minimalist.css">

    <style>
        /* Preview-specific styles */
        body {
            margin: 0;
            padding: 0;
        }
        .preview-watermark {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: rgba(0,0,0,0.5);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <!-- Preview Watermark -->
    <div class="preview-watermark">
        Preview Mode
    </div>

    <?php
    // Include the selected template
    switch($template) {
        case 'elegant':
            include 'templates/elegant.php';
            break;
        case 'minimalist':
            include 'templates/minimalist.php';
            break;
        case 'rustic':
            include 'templates/rustic.php';
            break;
        default:
            echo '<p class="text-center p-8">Template tidak ditemukan.</p>';
    }
    ?>

</body>
</html>
