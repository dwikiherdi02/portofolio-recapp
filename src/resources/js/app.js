// Import our custom CSS
import '../scss/app.scss'

import './bootstrap';

// Import only the Bootstrap components we need
import { Popover } from 'bootstrap';

// Create an example popover
document.querySelectorAll('[data-bs-toggle="popover"]')
    .forEach(popover => {
        new Popover(popover)
    })
