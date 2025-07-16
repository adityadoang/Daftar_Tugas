<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas Baru</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
            color: #2d3748;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 500px;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 2.2rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }

        h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 2px;
        }

        .form-container {
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #4a5568;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper::before {
            content: '✏️';
            position: absolute;
            left: 16px;
            font-size: 18px;
            z-index: 1;
            transition: all 0.3s ease;
        }

        input[type="text"] {
            width: 100%;
            padding: 16px 16px 16px 50px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            background: white;
            transition: all 0.3s ease;
            outline: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        input[type="text"]:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
        }

        input[type="text"]:focus + .input-focus-effect {
            opacity: 1;
            transform: scaleX(1);
        }

        .input-focus-effect {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 1px;
            opacity: 0;
            transform: scaleX(0);
            transition: all 0.3s ease;
        }

        .button-group {
            display: flex;
            gap: 16px;
            margin-top: 32px;
        }

        button {
            flex: 1;
            padding: 16px 24px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 8px 16px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-primary::before {
            content: '+';
            font-size: 20px;
            font-weight: bold;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            margin-top: 24px;
            padding: 12px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
            background: rgba(102, 126, 234, 0.1);
            border: 1px solid rgba(102, 126, 234, 0.2);
        }

        .back-link:hover {
            background: rgba(102, 126, 234, 0.15);
            transform: translateX(-2px);
            text-decoration: none;
        }

        .back-link::before {
            content: '←';
            font-size: 18px;
            font-weight: bold;
        }

        .form-footer {
            text-align: center;
            margin-top: 24px;
        }

        /* Loading animation for button */
        .btn-loading {
            position: relative;
            color: transparent;
        }

        .btn-loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding: 24px;
                margin: 10px;
            }

            h1 {
                font-size: 1.8rem;
            }

            .button-group {
                flex-direction: column;
            }

            button {
                width: 100%;
            }
        }

        /* Dark mode support */
        @media (prefers-color-scheme: dark) {
            .container {
                background: rgba(26, 32, 44, 0.95);
                color: #e2e8f0;
            }

            label {
                color: #cbd5e0;
            }

            input[type="text"] {
                background: rgba(45, 55, 72, 0.8);
                border-color: rgba(74, 85, 104, 0.6);
                color: #e2e8f0;
            }

            input[type="text"]:focus {
                border-color: #667eea;
                background: rgba(45, 55, 72, 0.9);
            }
        }

        /* Success feedback */
        .success-feedback {
            position: fixed;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #48bb78, #38a169);
            color: white;
            padding: 16px 24px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(72, 187, 120, 0.3);
            transform: translateX(400px);
            opacity: 0;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .success-feedback.show {
            transform: translateX(0);
            opacity: 1;
        }

        /* Floating particles animation */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0; }
            50% { transform: translateY(-100px) rotate(180deg); opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="particles">
        <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; animation-delay: 1s;"></div>
        <div class="particle" style="left: 30%; animation-delay: 2s;"></div>
        <div class="particle" style="left: 40%; animation-delay: 3s;"></div>
        <div class="particle" style="left: 50%; animation-delay: 4s;"></div>
        <div class="particle" style="left: 60%; animation-delay: 5s;"></div>
        <div class="particle" style="left: 70%; animation-delay: 0.5s;"></div>
        <div class="particle" style="left: 80%; animation-delay: 1.5s;"></div>
        <div class="particle" style="left: 90%; animation-delay: 2.5s;"></div>
    </div>

    <div class="container">
        <h1>Tambah Tugas Baru</h1>
        
        <div class="form-container">
            <form action="{{ route('tasks.store') }}" method="POST" id="taskForm">
                @csrf
                <div class="form-group">
                    <label for="description">Deskripsi Tugas:</label>
                    <div class="input-wrapper">
                        <input type="text" id="description" name="description" required 
                               placeholder="Masukkan deskripsi tugas yang ingin Anda tambahkan...">
                        <div class="input-focus-effect"></div>
                    </div>
                </div>
                
                <div class="button-group">
                    <button type="submit" class="btn-primary" id="submitBtn">
                        Tambah Tugas
                    </button>
                </div>
            </form>
        </div>
        
        <div class="form-footer">
            <a href="{{ route('tasks.index') }}" class="back-link">
                Kembali ke Daftar Tugas
            </a>
        </div>
    </div>

    <div class="success-feedback" id="successFeedback">
        Tugas berhasil ditambahkan! 🎉
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('taskForm');
            const submitBtn = document.getElementById('submitBtn');
            const descriptionInput = document.getElementById('description');
            const successFeedback = document.getElementById('successFeedback');

            // Add input animation
            descriptionInput.addEventListener('input', function() {
                if (this.value.length > 0) {
                    this.style.borderColor = '#667eea';
                } else {
                    this.style.borderColor = '#e2e8f0';
                }
            });

            // Add form submission animation
            form.addEventListener('submit', function(e) {
                // Add loading state to button
                submitBtn.classList.add('btn-loading');
                submitBtn.disabled = true;
                
                // Simulate success feedback (remove this in production)
                setTimeout(() => {
                    successFeedback.classList.add('show');
                    setTimeout(() => {
                        successFeedback.classList.remove('show');
                    }, 3000);
                }, 1000);
            });

            // Add floating effect to container
            const container = document.querySelector('.container');
            container.addEventListener('mousemove', function(e) {
                const rect = container.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateX = (y - centerY) / 20;
                const rotateY = (centerX - x) / 20;
                
                container.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
            });

            container.addEventListener('mouseleave', function() {
                container.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg)';
            });

            // Add keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                if (e.ctrlKey && e.key === 'Enter') {
                    form.submit();
                }
            });

            // Auto-focus on input
            descriptionInput.focus();
        });
    </script>
</body>
</html>