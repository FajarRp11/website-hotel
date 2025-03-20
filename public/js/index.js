AOS.init();

document.addEventListener("DOMContentLoaded", () => {
    window.addEventListener("scroll", function () {
        const scrollPosition = window.scrollY;
        const heroBackground = document.querySelector(".bg-hero-pattern");
        if (heroBackground) {
            heroBackground.style.transform = `translateY(${
                scrollPosition * 0.1
            }px)`;
        }
    });
});

// Check for flash message in session
document.addEventListener("DOMContentLoaded", function () {
    // Mengakses flash session message melalui meta tag
    // Tambahkan meta tag ini di bagian head layout Anda
    const flashMessage = "{{ session('status') }}";

    // Hanya tampilkan alert jika ada flash message dan isinya adalah "Registration successful!"
    if (flashMessage && flashMessage === "Registration successful!") {
        const alertElement = document.getElementById("success-alert");

        // Tampilkan alert
        alertElement.classList.remove("hidden");

        // Tampilkan alert dengan animasi
        alertElement.classList.remove("translate-x-full");
        alertElement.classList.add("translate-x-0");

        // Auto dismiss setelah 5 detik
        setTimeout(() => {
            dismissAlert();
        }, 5000);

        // Tambahkan event listener untuk tombol close
        document
            .getElementById("close-alert")
            .addEventListener("click", dismissAlert);

        function dismissAlert() {
            alertElement.classList.add("opacity-0");
            setTimeout(() => {
                alertElement.classList.add("hidden");
            }, 500);
        }
    }
});
