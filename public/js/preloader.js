/**
 * Professional Preloader JavaScript
 *
 * Purpose: Minimal, no-framework vanilla JS for preloader control
 *
 * Features:
 * - Auto-hide on page load
 * - Manual show/hide methods
 * - Progress tracking
 * - AJAX/Fetch integration
 * - Livewire support
 * - jQuery compatibility
 * - Performance optimized with requestAnimationFrame
 * - Removes from DOM after hide to free memory
 *
 * Usage:
 * Preloader.show();           // Show preloader
 * Preloader.hide();           // Hide preloader
 * Preloader.setProgress(75);  // Set progress to 75%
 *
 * Integration:
 * <script src="{{ asset('js/preloader.js') }}" defer></script>
 */

(function (window, document) {
  'use strict';

  // ============================================
  // Configuration
  // ============================================

  const CONFIG = {
    hideDelay: 500, // Delay before hiding (ms)
    removeDelay: 400, // Delay before removing from DOM (ms)
    minDisplayTime: 300, // Minimum display time (ms)
    progressSteps: [
      { time: 0, progress: 0 },
      { time: 200, progress: 30 },
      { time: 500, progress: 60 },
      { time: 1000, progress: 85 },
      { time: 2000, progress: 95 }
    ]
  };

  // ============================================
  // State Management
  // ============================================

  const state = {
    element: null,
    progressFill: null,
    percentageEl: null,
    statusEl: null,
    isVisible: true,
    showTime: Date.now(),
    currentProgress: 0,
    progressInterval: null,
    animationFrame: null
  };

  // ============================================
  // Helper Functions
  // ============================================

  /**
   * Get preloader element and cache references
   */
  function getElement() {
    if (!state.element) {
      state.element = document.getElementById('app-preloader');
      if (state.element) {
        state.progressFill = document.getElementById('preloader-progress-fill');
        state.percentageEl = document.getElementById('preloader-percentage');
        state.statusEl = document.getElementById('preloader-status');
      }
    }
    return state.element;
  }

  /**
   * Update progress with animation
   * @param {number} progress - Progress value (0-100)
   */
  function updateProgress(progress) {
    if (progress < 0) progress = 0;
    if (progress > 100) progress = 100;

    state.currentProgress = progress;

    // Use RAF for smooth animation
    if (state.animationFrame) {
      cancelAnimationFrame(state.animationFrame);
    }

    state.animationFrame = requestAnimationFrame(() => {
      // Update progress bar
      if (state.progressFill) {
        state.progressFill.style.width = progress + '%';
      }

      // Update percentage text
      if (state.percentageEl) {
        state.percentageEl.textContent = Math.round(progress);
      }

      // Update status text based on progress
      if (state.statusEl) {
        if (progress < 30) {
          state.statusEl.textContent = 'Initializing...';
        } else if (progress < 60) {
          state.statusEl.textContent = 'Loading resources...';
        } else if (progress < 90) {
          state.statusEl.textContent = 'Almost ready...';
        } else {
          state.statusEl.textContent = 'Finalizing...';
        }
      }
    });
  }

  /**
   * Simulate progressive loading
   */
  function simulateProgress() {
    let startTime = Date.now();
    let stepIndex = 0;

    function step() {
      const elapsed = Date.now() - startTime;
      const currentStep = CONFIG.progressSteps[stepIndex];
      const nextStep = CONFIG.progressSteps[stepIndex + 1];

      if (!nextStep) {
        updateProgress(currentStep.progress);
        return;
      }

      if (elapsed >= nextStep.time) {
        stepIndex++;
        if (stepIndex >= CONFIG.progressSteps.length - 1) {
          updateProgress(CONFIG.progressSteps[stepIndex].progress);
          return;
        }
      }

      // Interpolate between steps
      const stepProgress = (elapsed - currentStep.time) / (nextStep.time - currentStep.time);
      const progress = currentStep.progress + (nextStep.progress - currentStep.progress) * stepProgress;

      updateProgress(progress);
      state.progressInterval = requestAnimationFrame(step);
    }

    state.progressInterval = requestAnimationFrame(step);
  }

  /**
   * Update screen reader announcement
   * @param {string} message - Message to announce
   */
  function announceToScreenReader(message) {
    const srEl = document.getElementById('preloader-sr-text');
    if (srEl) {
      srEl.textContent = message;
    }
  }

  // ============================================
  // Public API
  // ============================================

  const Preloader = {
    /**
     * Show preloader
     * @param {Object} options - Configuration options
     */
    show: function (options) {
      options = options || {};
      const el = getElement();
      if (!el) return;

      state.isVisible = true;
      state.showTime = Date.now();

      el.classList.remove('preloader--hidden');
      el.style.display = 'flex';

      // Reset progress
      updateProgress(0);

      // Start progress simulation if progress variant
      if (el.getAttribute('data-variant') === 'progress') {
        simulateProgress();
      }

      announceToScreenReader('Loading content, please wait...');
    },

    /**
     * Hide preloader
     * @param {Function} callback - Optional callback after hide
     */
    hide: function (callback) {
      const el = getElement();
      if (!el || !state.isVisible) {
        if (callback) callback();
        return;
      }

      // Ensure minimum display time
      const elapsed = Date.now() - state.showTime;
      const remainingTime = Math.max(0, CONFIG.minDisplayTime - elapsed);

      setTimeout(() => {
        // Complete progress
        updateProgress(100);

        // Stop progress simulation
        if (state.progressInterval) {
          cancelAnimationFrame(state.progressInterval);
          state.progressInterval = null;
        }

        setTimeout(() => {
          state.isVisible = false;
          el.classList.add('preloader--hidden');

          announceToScreenReader('Content loaded');

          // Remove from DOM to free memory
          setTimeout(() => {
            if (el.parentNode) {
              el.parentNode.removeChild(el);
            }
            if (callback) callback();
          }, CONFIG.removeDelay);
        }, CONFIG.hideDelay);
      }, remainingTime);
    },

    /**
     * Set progress manually
     * @param {number} progress - Progress value (0-100)
     */
    setProgress: function (progress) {
      updateProgress(progress);
    },

    /**
     * Check if preloader is visible
     * @returns {boolean}
     */
    isVisible: function () {
      return state.isVisible;
    },

    /**
     * Get current progress
     * @returns {number}
     */
    getProgress: function () {
      return state.currentProgress;
    }
  };

  // ============================================
  // Auto-hide on Page Load
  // ============================================

  // Wait for all resources including images to load
  let allResourcesLoaded = false;
  let imagesLoaded = false;

  // Function to check if all images are loaded
  function checkImagesLoaded() {
    const images = document.querySelectorAll('img');
    let loadedCount = 0;
    let totalImages = images.length;

    if (totalImages === 0) {
      imagesLoaded = true;
      checkAndHide();
      return;
    }

    images.forEach(function (img) {
      if (img.complete) {
        loadedCount++;
      } else {
        img.addEventListener('load', function () {
          loadedCount++;
          if (loadedCount === totalImages) {
            imagesLoaded = true;
            checkAndHide();
          }
        });

        img.addEventListener('error', function () {
          loadedCount++;
          if (loadedCount === totalImages) {
            imagesLoaded = true;
            checkAndHide();
          }
        });
      }
    });

    if (loadedCount === totalImages) {
      imagesLoaded = true;
      checkAndHide();
    }
  }

  // Function to check if everything is ready
  function checkAndHide() {
    if (allResourcesLoaded && imagesLoaded) {
      // Additional delay to ensure everything is rendered
      setTimeout(function () {
        Preloader.hide();
      }, 300);
    }
  }

  // Listen for window load event (fires after all resources are loaded)
  window.addEventListener('load', function () {
    allResourcesLoaded = true;

    // Check images after window load
    checkImagesLoaded();
  });

  // Fallback: If preloader is still showing after 10 seconds, force hide
  setTimeout(function () {
    if (Preloader.isVisible()) {
      console.warn('Preloader force hidden after timeout');
      Preloader.hide();
    }
  }, 10000);

  // ============================================
  // AJAX/Fetch Integration
  // ============================================

  /**
   * Hook into jQuery AJAX if available
   */
  if (window.jQuery) {
    window.jQuery(document).on('ajaxStart', function () {
      Preloader.show();
    });

    window.jQuery(document).on('ajaxStop ajaxError', function () {
      Preloader.hide();
    });
  }

  /**
   * Hook into native fetch
   * Wrap fetch to show/hide preloader
   */
  if (window.fetch) {
    const originalFetch = window.fetch;
    let pendingRequests = 0;

    window.fetch = function () {
      pendingRequests++;
      if (pendingRequests === 1) {
        Preloader.show();
      }

      return originalFetch.apply(this, arguments).then(
        function (response) {
          pendingRequests--;
          if (pendingRequests === 0) {
            Preloader.hide();
          }
          return response;
        },
        function (error) {
          pendingRequests--;
          if (pendingRequests === 0) {
            Preloader.hide();
          }
          throw error;
        }
      );
    };
  }

  // ============================================
  // Livewire Integration
  // ============================================

  document.addEventListener('DOMContentLoaded', function () {
    // Livewire v2
    if (window.livewire) {
      window.livewire.on('loading', function () {
        Preloader.show();
      });

      window.livewire.on('loaded', function () {
        Preloader.hide();
      });
    }

    // Livewire v3
    document.addEventListener('livewire:init', function () {
      if (window.Livewire) {
        window.Livewire.hook('request', ({ fail }) => {
          Preloader.show();

          fail(() => {
            Preloader.hide();
          });
        });

        window.Livewire.hook('commit', () => {
          Preloader.hide();
        });
      }
    });

    // Legacy Livewire events
    document.addEventListener('livewire:load', function () {
      Preloader.hide();
    });

    document.addEventListener('livewire:request-start', function () {
      Preloader.show();
    });

    document.addEventListener('livewire:request-end', function () {
      Preloader.hide();
    });
  });

  // ============================================
  // Page Visibility API
  // Handle when user switches tabs
  // ============================================

  document.addEventListener('visibilitychange', function () {
    if (document.hidden && state.isVisible) {
      // Pause progress when tab is hidden
      if (state.progressInterval) {
        cancelAnimationFrame(state.progressInterval);
      }
    } else if (!document.hidden && state.isVisible) {
      // Resume progress when tab is visible
      const el = getElement();
      if (el && el.getAttribute('data-variant') === 'progress') {
        simulateProgress();
      }
    }
  });

  // ============================================
  // Expose API to Global Scope
  // ============================================

  window.Preloader = Preloader;

  // AMD/CommonJS compatibility
  if (typeof define === 'function' && define.amd) {
    define(function () {
      return Preloader;
    });
  } else if (typeof module !== 'undefined' && module.exports) {
    module.exports = Preloader;
  }
})(window, document);

// ============================================
// Usage Examples
// ============================================

/*

// Basic usage
Preloader.show();
Preloader.hide();

// With callback
Preloader.hide(function() {
  console.log('Preloader hidden!');
});

// Set custom progress
Preloader.setProgress(50);

// Check if visible
if (Preloader.isVisible()) {
  console.log('Preloader is showing');
}

// Manual AJAX example
fetch('/api/data')
  .then(response => response.json())
  .then(data => {
    // Preloader auto-hides
  });

// Custom fetch without auto-preloader
const originalFetch = window.fetch;
window.fetch = originalFetch; // Restore original

// Manual control with fetch
Preloader.show();
fetch('/api/data')
  .then(response => response.json())
  .then(data => {
    Preloader.hide();
  })
  .catch(error => {
    Preloader.hide();
  });

*/
