<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
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
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        h1 {
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 2.5rem;
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

        .success-message {
            background: linear-gradient(135deg, #48bb78, #38a169);
            color: white;
            padding: 16px 24px;
            border-radius: 12px;
            margin-bottom: 24px;
            box-shadow: 0 8px 16px rgba(72, 187, 120, 0.3);
            border: none;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .add-task-section {
            text-align: center;
            margin-bottom: 32px;
        }

        .add-task-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 14px 28px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 8px 16px rgba(102, 126, 234, 0.3);
            border: none;
            font-size: 16px;
        }

        .add-task-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(102, 126, 234, 0.4);
            text-decoration: none;
        }

        .add-task-btn::before {
            content: '+';
            font-size: 20px;
            font-weight: bold;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #718096;
            font-size: 18px;
        }

        .empty-state::before {
            content: '📝';
            font-size: 64px;
            display: block;
            margin-bottom: 16px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            background: white;
            border: 1px solid rgba(226, 232, 240, 0.8);
            margin-bottom: 16px;
            padding: 20px 24px;
            border-radius: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        li::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 0 4px 4px 0;
        }

        li:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .completed {
            background: linear-gradient(135deg, #f7fafc, #edf2f7);
            color: #a0aec0;
            border-color: #e2e8f0;
        }

        .completed::before {
            background: #a0aec0;
        }

        .completed span {
            text-decoration: line-through;
            position: relative;
        }

        .completed span::after {
            content: '✓';
            position: absolute;
            right: -24px;
            color: #48bb78;
            font-weight: bold;
        }

        .task-content {
            flex: 1;
            font-size: 16px;
            font-weight: 500;
            padding-right: 20px;
        }

        .task-actions {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
            position: relative;
            overflow: hidden;
        }

        .btn-toggle {
            background: linear-gradient(135deg, #ed8936, #dd6b20);
            color: white;
            box-shadow: 0 4px 12px rgba(237, 137, 54, 0.3);
        }

        .btn-toggle:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(237, 137, 54, 0.4);
        }

        .btn-delete {
            background: linear-gradient(135deg, #f56565, #e53e3e);
            color: white;
            box-shadow: 0 4px 12px rgba(245, 101, 101, 0.3);
        }

        .btn-delete:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(245, 101, 101, 0.4);
        }

        .completed .btn-toggle {
            background: linear-gradient(135deg, #48bb78, #38a169);
        }

        .completed .btn-toggle:hover {
            box-shadow: 0 6px 16px rgba(72, 187, 120, 0.4);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding: 24px;
                margin: 10px;
            }

            h1 {
                font-size: 2rem;
            }

            li {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .task-content {
                padding-right: 0;
            }

            .task-actions {
                width: 100%;
                justify-content: center;
            }

            button {
                flex: 1;
                justify-content: center;
            }
        }

        /* Dark mode support */
        @media (prefers-color-scheme: dark) {
            .container {
                background: rgba(26, 32, 44, 0.95);
                color: #e2e8f0;
            }

            li {
                background: rgba(45, 55, 72, 0.8);
                border-color: rgba(74, 85, 104, 0.6);
            }

            .completed {
                background: rgba(45, 55, 72, 0.5);
                color: #a0aec0;
            }
        }

        /* Animation for task completion */
        @keyframes taskComplete {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .task-complete-animation {
            animation: taskComplete 0.5s ease-out;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Tugas Saya</h1>
        
        {{-- Pesan sukses dari session --}}
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
        
        {{-- Link untuk menambah tugas baru --}}
        <div class="add-task-section">
            <a href="{{ route('tasks.create') }}" class="add-task-btn">
                Tambah Tugas Baru
            </a>
        </div>
        
        {{-- Menampilkan daftar tugas --}}
        @if($tasks->isEmpty())
            <div class="empty-state">
                <p>Belum ada tugas! Ayo tambahkan satu.</p>
            </div>
        @else
            <ul>
                @foreach($tasks as $task)
                    <li class="@if($task->is_completed) completed @endif">
                        <div class="task-content">
                            <span>{{ $task->description }}</span>
                        </div>
                        <div class="task-actions">
                            {{-- Form untuk mengubah status tugas (toggle complete) --}}
                            <form action="{{ route('tasks.toggle', $task->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn-toggle">
                                    {{ $task->is_completed ? 'Belum Selesai' : 'Selesai' }}
                                </button>
                            </form>
                            
                            {{-- Form untuk menghapus tugas --}}
                            <form action="{{ route('tasks.hapus', $task->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus tugas ini?');">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <script>
        // Add smooth animations and interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Add hover effects and smooth transitions
            const taskItems = document.querySelectorAll('li');
            
            taskItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });
                
                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
            
            // Add click animation to buttons
            const buttons = document.querySelectorAll('button');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                    }, 150);
                });
            });
        });
    </script>
</body>
</html>