/**
 * Contact Form Email Submission Handler
 * Handles AJAX form submission with CSRF protection, validation, and user feedback
 */

document.addEventListener('DOMContentLoaded', function () {
  const contactForm = document.getElementById('contactForm');
  const submitBtn = document.getElementById('submitBtn');
  const submitText = document.getElementById('submitText');
  const successMessage = document.getElementById('successMessage');
  const errorMessage = document.getElementById('errorMessage');
  const successText = document.getElementById('successText');
  const errorText = document.getElementById('errorText');

  // Original button text
  const originalBtnText = submitText.textContent;

  if (!contactForm) {
    console.warn('Contact form not found on this page');
    return;
  }

  contactForm.addEventListener('submit', async function (e) {
    e.preventDefault();

    // Hide previous messages
    successMessage.classList.add('d-none');
    errorMessage.classList.add('d-none');

    // Disable button and show loading state
    submitBtn.disabled = true;
    submitText.textContent = 'Sending...';
    submitBtn.classList.add('disabled');

    // Get form data
    const formData = new FormData(contactForm);

    // Get CSRF token from meta tag or form
    const csrfToken =
      document.querySelector('input[name="_token"]')?.value ||
      document.querySelector('meta[name="csrf-token"]')?.content;

    try {
      const response = await fetch('/contact/send', {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': csrfToken,
          Accept: 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
      });

      const data = await response.json();

      if (response.ok && data.success) {
        // Success - show success message
        successText.textContent =
          data.message || "Thank you for your message! We'll get back to you within 2 business days.";
        successMessage.classList.remove('d-none');

        // Reset form
        contactForm.reset();

        // Scroll to success message
        successMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

        // Optional: Hide success message after 10 seconds
        setTimeout(() => {
          successMessage.classList.add('d-none');
        }, 10000);
      } else {
        // Error - show error message
        const errorMsg =
          data.message ||
          'Sorry, there was an error sending your message. Please try again or contact us via LinkedIn.';

        // If validation errors exist, show them
        if (data.errors) {
          const errorList = Object.values(data.errors).flat().join(', ');
          errorText.textContent = errorList;
        } else {
          errorText.textContent = errorMsg;
        }

        errorMessage.classList.remove('d-none');
        errorMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      }
    } catch (error) {
      console.error('Contact form submission error:', error);

      // Network or unexpected error
      errorText.textContent = 'A network error occurred. Please check your connection and try again.';
      errorMessage.classList.remove('d-none');
      errorMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    } finally {
      // Re-enable button and restore original text
      submitBtn.disabled = false;
      submitBtn.classList.remove('disabled');
      submitText.textContent = originalBtnText;
    }
  });

  // Character counter for message field (optional enhancement)
  const messageField = document.getElementById('message');
  if (messageField) {
    const maxLength = messageField.getAttribute('maxlength') || 5000;

    // Create counter element
    const counterDiv = document.createElement('div');
    counterDiv.className = 'text-muted small mt-1 text-end';
    counterDiv.id = 'characterCounter';
    messageField.parentElement.appendChild(counterDiv);

    const updateCounter = () => {
      const currentLength = messageField.value.length;
      counterDiv.textContent = `${currentLength} / ${maxLength} characters`;

      if (currentLength > maxLength * 0.9) {
        counterDiv.classList.add('text-warning');
      } else {
        counterDiv.classList.remove('text-warning');
      }
    };

    messageField.addEventListener('input', updateCounter);
    updateCounter(); // Initial update
  }

  // Client-side email validation enhancement
  const emailField = document.getElementById('email');
  if (emailField) {
    emailField.addEventListener('blur', function () {
      const emailValue = this.value.trim();
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (emailValue && !emailPattern.test(emailValue)) {
        this.setCustomValidity('Please enter a valid email address');
        this.reportValidity();
      } else {
        this.setCustomValidity('');
      }
    });
  }
});
