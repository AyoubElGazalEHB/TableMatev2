document.addEventListener('DOMContentLoaded', function() {
    
    // Real-time validation for all forms
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        const inputs = form.querySelectorAll('input, textarea, select');
        
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                validateField(this);
            });
            
            input.addEventListener('input', function() {
                clearFieldError(this);
            });
        });
        
        form.addEventListener('submit', function(e) {
            if (!validateForm(this)) {
                e.preventDefault();
                return false;
            }
        });
    });
    
    function validateField(field) {
        const fieldName = field.name;
        const fieldValue = field.value.trim();
        let isValid = true;
        let errorMessage = '';
        
        // Clear previous errors
        clearFieldError(field);
        
        // Required field validation
        if (field.hasAttribute('required') && !fieldValue) {
            isValid = false;
            errorMessage = `${getFieldLabel(field)} is required.`;
        }
        
        // Email validation
        else if (field.type === 'email' && fieldValue) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(fieldValue)) {
                isValid = false;
                errorMessage = 'Please enter a valid email address.';
            }
        }
        
        // Password validation
        else if (field.type === 'password' && fieldValue) {
            if (fieldValue.length < 8) {
                isValid = false;
                errorMessage = 'Password must be at least 8 characters long.';
            }
        }
        
        // Password confirmation
        else if (field.name === 'password_confirmation' && fieldValue) {
            const passwordField = document.querySelector('input[name="password"]');
            if (passwordField && fieldValue !== passwordField.value) {
                isValid = false;
                errorMessage = 'Password confirmation does not match.';
            }
        }
        
        // Name validation (letters and spaces only)
        else if (field.name === 'name' && fieldValue) {
            const nameRegex = /^[a-zA-Z\s]+$/;
            if (!nameRegex.test(fieldValue)) {
                isValid = false;
                errorMessage = 'Name can only contain letters and spaces.';
            }
        }
        
        // Phone validation
        else if (field.name === 'phone' && fieldValue) {
            const phoneRegex = /^[0-9+\-\s()]+$/;
            if (!phoneRegex.test(fieldValue)) {
                isValid = false;
                errorMessage = 'Please enter a valid phone number.';
            }
        }
        
        // Date validation (future dates for reservations)
        else if (field.type === 'date' && fieldValue && field.name.includes('date')) {
            const selectedDate = new Date(fieldValue);
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            
            if (selectedDate <= today) {
                isValid = false;
                errorMessage = 'Please select a future date.';
            }
        }
        
        // Message length validation
        else if (field.name === 'message' && fieldValue) {
            if (fieldValue.length < 10) {
                isValid = false;
                errorMessage = 'Message must be at least 10 characters long.';
            } else if (fieldValue.length > 1000) {
                isValid = false;
                errorMessage = 'Message cannot exceed 1000 characters.';
            }
        }
        
        if (!isValid) {
            showFieldError(field, errorMessage);
        }
        
        return isValid;
    }
    
    function validateForm(form) {
        const inputs = form.querySelectorAll('input, textarea, select');
        let isFormValid = true;
        
        inputs.forEach(input => {
            if (!validateField(input)) {
                isFormValid = false;
            }
        });
        
        return isFormValid;
    }
    
    function showFieldError(field, message) {
        field.classList.add('is-invalid');
        
        let errorDiv = field.parentNode.querySelector('.invalid-feedback');
        if (!errorDiv) {
            errorDiv = document.createElement('div');
            errorDiv.className = 'invalid-feedback';
            field.parentNode.appendChild(errorDiv);
        }
        
        errorDiv.textContent = message;
        errorDiv.style.display = 'block';
    }
    
    function clearFieldError(field) {
        field.classList.remove('is-invalid');
        const errorDiv = field.parentNode.querySelector('.invalid-feedback');
        if (errorDiv) {
            errorDiv.style.display = 'none';
        }
    }
    
    function getFieldLabel(field) {
        const label = field.parentNode.querySelector('label');
        if (label) {
            return label.textContent.replace('*', '').trim();
        }
        return field.name.charAt(0).toUpperCase() + field.name.slice(1);
    }
    
    // Real-time character counter for message fields
    const messageFields = document.querySelectorAll('textarea[name="message"]');
    messageFields.forEach(field => {
        const maxLength = 1000;
        
        // Create character counter
        const counter = document.createElement('small');
        counter.className = 'form-text text-muted character-counter';
        field.parentNode.appendChild(counter);
        
        function updateCounter() {
            const remaining = maxLength - field.value.length;
            counter.textContent = `${field.value.length}/${maxLength} characters`;
            
            if (remaining < 50) {
                counter.classList.add('text-warning');
            } else {
                counter.classList.remove('text-warning');
            }
        }
        
        field.addEventListener('input', updateCounter);
        updateCounter(); // Initial count
    });
    
    // Form submission loading state
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
            }
        });
    });
});
