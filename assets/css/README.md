# CSS Structure Documentation

## Overview
This documentation explains the CSS architecture used in the Wedding Digital Platform. The CSS is organized using a modular approach with separate files for common styles, components, and templates.

## Directory Structure
```
assets/css/
├── common/
│   ├── base.css        # Reset & base styles
│   ├── utilities.css   # Utility classes
│   └── animations.css  # Shared animations
│
├── components/
│   ├── gallery.css     # Gallery component styles
│   ├── countdown.css   # Countdown timer styles
│   └── forms.css       # Form elements styles
│
└── templates/
    ├── elegant.css     # Elegant theme styles
    ├── rustic.css      # Rustic theme styles
    └── minimalist.css  # Minimalist theme styles
```

## Usage

### 1. Common Styles

#### base.css
Contains reset and base styles:
```css
/* Example usage */
body {
    font-family: 'Montserrat', sans-serif;
}

.section {
    padding: 5rem 0;
}
```

#### utilities.css
Utility classes for common properties:
```css
/* Example usage */
.mt-4 { margin-top: 1rem; }
.flex { display: flex; }
.text-center { text-align: center; }
```

#### animations.css
Shared animations and transitions:
```css
/* Example usage */
.fade-in { animation: fadeIn 1s ease-out; }
.slide-up { animation: slideUp 1s ease-out; }
```

### 2. Component Styles

#### gallery.css
Gallery component specific styles:
```css
/* Example usage */
<div class="gallery-grid">
    <div class="gallery-item">
        <img src="..." alt="Gallery Image">
    </div>
</div>
```

#### countdown.css
Countdown timer styles:
```css
/* Example usage */
<div class="countdown-timer">
    <div class="countdown-item">
        <div class="countdown-number">00</div>
        <div class="countdown-label">Days</div>
    </div>
</div>
```

#### forms.css
Form elements styling:
```css
/* Example usage */
<form class="form-container">
    <input type="text" class="form-input">
    <button class="form-button">Submit</button>
</form>
```

### 3. Template Styles

Each template has its own CSS file with specific variables and styles:

#### elegant.css
```css
.template-elegant {
    --primary-color: #FF69B4;
    --secondary-color: #FFC0CB;
}
```

#### rustic.css
```css
.template-rustic {
    --primary-color: #8B4513;
    --secondary-color: #DEB887;
}
```

#### minimalist.css
```css
.template-minimalist {
    --primary-color: #1a1a1a;
    --secondary-color: #f5f5f5;
}
```

## Implementation Guide

1. Include Required CSS:
```html
<!-- Always include common styles -->
<link rel="stylesheet" href="/assets/css/common/base.css">
<link rel="stylesheet" href="/assets/css/common/utilities.css">
<link rel="stylesheet" href="/assets/css/common/animations.css">

<!-- Include component styles as needed -->
<link rel="stylesheet" href="/assets/css/components/gallery.css">
<link rel="stylesheet" href="/assets/css/components/countdown.css">
<link rel="stylesheet" href="/assets/css/components/forms.css">

<!-- Include specific template style -->
<link rel="stylesheet" href="/assets/css/templates/elegant.css">
```

2. Apply Template Class:
```html
<!-- For elegant template -->
<div class="template-elegant">
    <!-- Content here -->
</div>

<!-- For rustic template -->
<div class="template-rustic">
    <!-- Content here -->
</div>

<!-- For minimalist template -->
<div class="template-minimalist">
    <!-- Content here -->
</div>
```

## Best Practices

1. **Template Specificity**
   - Always wrap template-specific content in the template class
   - Use template variables for colors and spacing

2. **Component Usage**
   - Keep components modular and reusable
   - Use component classes without modification
   - Customize through template variables

3. **Utility Classes**
   - Use utility classes for minor adjustments
   - Combine with component classes when needed

4. **Responsive Design**
   - All styles include mobile-first responsive design
   - Use provided breakpoint mixins

## Variables

### Common Variables
```css
:root {
    --spacing-unit: 1rem;
    --border-radius: 0.5rem;
}
```

### Template-Specific Variables
Each template defines its own color scheme and specific variables:

```css
.template-elegant {
    --primary-color: #FF69B4;
    --secondary-color: #FFC0CB;
    --text-color: #333333;
    --accent-color: #FFB6C1;
}
```

## Adding New Styles

1. **New Component**
   - Create new file in components/
   - Use template variables for theming
   - Include responsive styles

2. **New Template**
   - Create new file in templates/
   - Define template variables
   - Override component styles as needed

## Performance

- CSS is modularly structured for optimal loading
- Use only required components
- Templates use CSS variables for efficient theming
- Animations are optimized for performance

## Browser Support

- All styles support modern browsers
- Fallbacks included for older browsers
- CSS variables have fallback values
