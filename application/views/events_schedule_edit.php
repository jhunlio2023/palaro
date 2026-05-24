<!DOCTYPE html>
<html lang="en">

<?php include('includes/head.php'); ?>

<style>
    body {
        font-family: var(--app-font);
        background: #f8fafc;
    }

    .card {
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.04);
    }

    .card-title {
        font-weight: 800;
        color: #111827;
    }

    .table thead th {
        text-transform: uppercase;
        font-size: 0.78rem;
        letter-spacing: 0.08em;
        color: #6b7280;
        border-bottom-width: 2px;
    }

    .btn-icon {
        width: 34px;
        height: 34px;
        min-width: 34px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
    }

    .team-logo {
        width: 48px;
        height: 48px;
        object-fit: cover;
        aspect-ratio: 1 / 1;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        box-shadow: 0 4px 12px rgba(15, 23, 42, 0.08);
    }
</style>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>
    <div id="wrapper">

        <?php include('includes/top-nav-bar.php'); ?>
        <?php include('includes/sidebar.php'); ?>

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">

                    <?php
                    $municipalities = isset($municipalities) ? $municipalities : array();
                    $meet_title = isset($meet->meet_title) ? $meet->meet_title : 'Provincial Meet';
                    $meet_year  = isset($meet->meet_year)  ? $meet->meet_year  : date('Y');
                    ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between flex-wrap">
                                <div class="mb-2">
                                    <h4 class="page-title mb-0">
                                        <?= htmlspecialchars($meet_title . ' ' . $meet_year, ENT_QUOTES, 'UTF-8'); ?> – Event Schedule
                                    </h4>
                                </div>

                            </div>
                            <hr style="border:0;height:2px;background:linear-gradient(90deg,#059669 0%,#0ea5e9 50%,#22c55e 100%);border-radius:999px;margin-top:4px;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <?php if ($this->session->flashdata('success')): ?>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success',
                                            text: <?= json_encode($this->session->flashdata('success')); ?>,
                                            timer: 3000,
                                            showConfirmButton: false
                                        });
                                    });
                                </script>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('error')): ?>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error',
                                            text: <?= json_encode($this->session->flashdata('error')); ?>,
                                            confirmButtonText: 'OK'
                                        });
                                    });
                                </script>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    
<form method="post" action="<?= site_url('provincial/sched_save'); ?>" id="scheduleEntryForm">

                    <div class="form-grid-box">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group-block">
                                    <label class="form-label">
                                        <i class="bi bi-person-badge-fill"></i>
                                        Encoder Full Name
                                    </label>
                                    <input type="text" name="encoder" id="encoder" class="form-control" placeholder="Example: Juan P. Dela Cruz" required>
                                </div>
                            </div>

                            

                            <div class="col-md-12">
                                <div class="form-group-block">
                                    <label class="form-label">
                                        <i class="bi bi-trophy-fill"></i>
                                        Event Name
                                    </label>
                                    <input type="text" name="event" id="eventName" class="form-control" placeholder="Example: Archery" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group-block">
                                    <label class="form-label">
                                        <i class="bi bi-geo-alt-fill"></i>
                                        Venue / Location
                                    </label>
                                    <input type="text" name="location" id="venue" class="form-control" placeholder="Example: Open Space - Labnig" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="datetime-row">

                                    <div class="datetime-field">
                                        <div class="form-group-block">
                                            <label class="form-label">
                                                <i class="bi bi-calendar-event-fill"></i>
                                                Date
                                            </label>
                                            <input type="date" name="cdate" id="scheduleDate" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="datetime-field">
                                        <div class="form-group-block">
                                            <label class="form-label">
                                                <i class="bi bi-clock-fill"></i>
                                                Time
                                            </label>
                                            <input type="time" name="ctime" id="scheduleTime" class="form-control" required>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="group-category-row">

                                    <div class="group-category-field">
                                        <div class="form-group-block">
                                            <label class="form-label">
                                                <i class="bi bi-people-fill"></i>
                                                Group
                                            </label>
                                            <select name="group" id="eventGroup" class="custom-select">
                                                <option value="">Select Group</option>
                                                <option value="Elementary">Elementary</option>
                                                <option value="Secondary">Secondary</option>
                                                <option value="PARAGAMES">PARAGAMES</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="group-category-field">
                                        <div class="form-group-block">
                                            <label class="form-label">
                                                <i class="bi bi-tags-fill"></i>
                                                Category
                                            </label>
                                            <input type="text" name="category" id="category" required class="form-control" placeholder="Example: Boys / Girls / Mixed">
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="captcha-action-row">
                        <div class="captcha-box">
                            <div class="g-recaptcha" data-sitekey="6Lc_jfgsAAAAAG-2U_ClZ-QUSOPJ8vIreeX6DhiX"></div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-check-circle-fill"></i>
                                Save Schedule
                            </button>
                        </div>
                    </div>

                </form>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <?php include('includes/footer.php'); ?>

        </div>

    </div>

    <?php include('includes/footer_plugins.php'); ?>

</body>

</html>