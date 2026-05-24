<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Daily Event Schedule Entry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        :root {
            --poster-red: #c71920;
            --poster-red-dark: #8f0b11;
            --poster-soft: #ffe4e6;
            --poster-yellow: #ffd21c;
            --poster-text: #8b0d14;
            --app-font: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: var(--app-font);
            background:
                radial-gradient(120% 120% at 10% 0%, rgba(255, 210, 28, 0.18), transparent 38%),
                radial-gradient(120% 120% at 95% 100%, rgba(40, 0, 0, 0.45), transparent 45%),
                linear-gradient(180deg, #8b0000 0%, #5b0000 55%, #3b0000 100%);
            color: #ffffff;
            padding: 22px 12px;
        }

        .schedule-entry-wrapper {
            width: 100%;
            max-width: 980px;
            margin: 0 auto;
        }

        .schedule-entry-board {
            border-radius: 24px;
            overflow: hidden;
            background:
                linear-gradient(145deg, rgba(62, 0, 0, 0.72) 0 18%, transparent 18% 100%),
                linear-gradient(325deg, transparent 0 78%, rgba(62, 0, 0, 0.56) 78% 100%),
                linear-gradient(135deg, #c71920 0%, #b9151b 45%, #8f0b11 100%);
            border: 1px solid rgba(255, 255, 255, 0.16);
            box-shadow: 0 22px 46px rgba(75, 0, 0, 0.42);
            position: relative;
        }

        .schedule-entry-board::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(100% 80% at 0% 0%, rgba(55, 0, 0, 0.46), transparent 42%),
                radial-gradient(100% 80% at 100% 100%, rgba(55, 0, 0, 0.38), transparent 42%);
            pointer-events: none;
        }

        .schedule-entry-board::after {
            content: '';
            position: absolute;
            right: 22px;
            bottom: 18px;
            width: 130px;
            height: 38px;
            background:
                repeating-linear-gradient(
                    -28deg,
                    rgba(0, 0, 0, 0.30) 0,
                    rgba(0, 0, 0, 0.30) 3px,
                    transparent 3px,
                    transparent 9px
                );
            opacity: 0.36;
            pointer-events: none;
        }

        .schedule-entry-inner {
            position: relative;
            z-index: 1;
            padding: 32px 30px 34px;
        }

        .schedule-entry-header {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 26px;
        }

        .schedule-entry-icon {
            width: 62px;
            height: 62px;
            min-width: 62px;
            border-radius: 50%;
            background: #ffffff;
            color: var(--poster-red-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            box-shadow:
                6px 6px 0 rgba(0, 0, 0, 0.24),
                inset 0 0 0 5px var(--poster-soft);
            position: relative;
        }

        .schedule-entry-icon::before {
            content: '';
            position: absolute;
            inset: -7px;
            border-radius: 50%;
            border: 2px dashed rgba(255, 255, 255, 0.68);
        }

        .schedule-entry-icon::after {
            content: '';
            position: absolute;
            right: -8px;
            top: 9px;
            width: 12px;
            height: 12px;
            background: var(--poster-yellow);
            border-radius: 50%;
            box-shadow:
                0 18px 0 var(--poster-yellow),
                0 36px 0 var(--poster-yellow);
        }

        .schedule-entry-icon i {
            position: relative;
            z-index: 1;
            transform: rotate(-8deg);
        }

        .schedule-entry-kicker {
            margin: 0 0 6px;
            color: var(--poster-soft);
            font-size: 0.72rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.18em;
        }

        .schedule-entry-title {
            margin: 0;
            color: #ffffff;
            font-size: 2.25rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.045em;
            line-height: 1;
            text-shadow: 0 3px 0 rgba(0, 0, 0, 0.28);
        }

        .schedule-entry-subtitle {
            margin: 7px 0 0;
            color: rgba(255, 255, 255, 0.78);
            font-size: 0.86rem;
            font-weight: 700;
        }

        .schedule-form-card {
            background: #ffffff;
            border-radius: 18px;
            padding: 22px;
            box-shadow:
                8px 8px 0 rgba(0, 0, 0, 0.18),
                0 0 0 1px rgba(255, 255, 255, 0.18);
        }

        .form-card-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 20px;
            padding-bottom: 14px;
            border-bottom: 1px solid #f6d4d8;
        }

        .form-card-kicker {
            margin: 0 0 5px;
            color: rgba(139, 13, 20, 0.62);
            font-size: 0.68rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.16em;
        }

        .form-section-title {
            margin: 0;
            color: var(--poster-red-dark);
            font-size: 1.35rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .form-status-pill {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 13px;
            border-radius: 999px;
            background: var(--poster-soft);
            color: var(--poster-text);
            font-size: 0.68rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            white-space: nowrap;
        }

        .form-grid-box {
            padding: 18px 18px 8px;
            border-radius: 16px;
            background:
                radial-gradient(120% 120% at 0% 0%, rgba(255, 228, 230, 0.75), transparent 45%),
                #fffafa;
            border: 1px solid #f7d2d6;
        }

        .form-grid-box .row > [class*="col-"] {
            margin-bottom: 12px;
        }

        .form-group-block {
            display: flex;
            flex-direction: column;
            width: 100%;
            margin-bottom: 8px;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 7px;
            color: var(--poster-text);
            font-size: 0.76rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 9px;
            line-height: 1.2;
        }

        .form-label i {
            color: var(--poster-red);
            font-size: 0.9rem;
        }

        .form-control,
        .custom-select {
            display: block;
            width: 100%;
            border-radius: 0;
            border: 1px solid #f3c7cc;
            background-color: #ffffff;
            color: #111827;
            font-weight: 700;
            font-size: 0.9rem;
            min-height: 46px;
            box-shadow: 0 5px 14px rgba(139, 13, 20, 0.04);
            transition: all 0.18s ease;
            margin-bottom: 14px;
        }

        .form-control:hover,
        .custom-select:hover {
            border-color: #eba8ae;
        }

        .form-control:focus,
        .custom-select:focus {
            border-color: var(--poster-red);
            box-shadow:
                0 0 0 3px rgba(199, 25, 32, 0.13),
                0 8px 18px rgba(139, 13, 20, 0.08);
        }

        .datetime-row,
        .group-category-row {
            display: flex;
            gap: 18px;
            width: 100%;
        }

        .datetime-field,
        .group-category-field {
            flex: 1;
            min-width: 0;
        }

        .datetime-field .form-group-block,
        .group-category-field .form-group-block {
            margin-bottom: 0;
        }

        .captcha-action-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            margin-top: 24px;
            flex-wrap: wrap;
        }

        .captcha-box {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            min-height: 78px;
        }

        .schedule-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            margin-top: 0;
            margin-left: auto;
            flex-wrap: wrap;
        }

        .btn-schedule-save,
        .btn-schedule-back {
            border-radius: 999px;
            padding: 10px 18px;
            font-size: 0.78rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            border: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            text-decoration: none;
            cursor: pointer;
            min-height: 44px;
        }

        .btn-schedule-save {
            background: linear-gradient(180deg, #ffd21c 0%, #f6b800 100%);
            color: #111827;
            box-shadow: 0 7px 0 rgba(139, 13, 20, 0.22);
        }

        .btn-schedule-back {
            background: var(--poster-soft);
            color: var(--poster-text);
        }

        .btn-schedule-save:hover,
        .btn-schedule-back:hover {
            transform: translateY(-1px);
            filter: brightness(0.98);
            text-decoration: none;
        }

        .schedule-alert {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 16px;
            margin: 0 0 20px;
            border-radius: 14px;
            font-size: 0.86rem;
            font-weight: 800;
            line-height: 1.4;
            box-shadow: 6px 6px 0 rgba(0, 0, 0, 0.14);
        }

        .schedule-alert i {
            font-size: 1.15rem;
            margin-top: 1px;
        }

        .schedule-alert-success {
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .schedule-alert-error {
            background: #fff1f2;
            color: #9f1239;
            border: 1px solid #fecdd3;
        }

        @media (max-width: 576px) {
            body {
                padding: 14px 8px;
            }

            .schedule-entry-board {
                border-radius: 18px;
            }

            .schedule-entry-inner {
                padding: 24px 16px 28px;
            }

            .schedule-entry-header {
                gap: 13px;
                margin-bottom: 20px;
            }

            .schedule-entry-icon {
                width: 48px;
                height: 48px;
                min-width: 48px;
                font-size: 1.28rem;
                box-shadow:
                    4px 4px 0 rgba(0, 0, 0, 0.22),
                    inset 0 0 0 4px var(--poster-soft);
            }

            .schedule-entry-icon::before {
                inset: -5px;
            }

            .schedule-entry-icon::after {
                right: -6px;
                top: 7px;
                width: 9px;
                height: 9px;
                box-shadow:
                    0 14px 0 var(--poster-yellow),
                    0 28px 0 var(--poster-yellow);
            }

            .schedule-entry-kicker {
                font-size: 0.56rem;
                letter-spacing: 0.14em;
            }

            .schedule-entry-title {
                font-size: 1.4rem;
            }

            .schedule-entry-subtitle {
                font-size: 0.74rem;
            }

            .schedule-form-card {
                padding: 16px;
                border-radius: 15px;
            }

            .form-card-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .form-status-pill {
                width: 100%;
                justify-content: center;
            }

            .form-grid-box {
                padding: 14px 14px 4px;
            }

            .form-section-title {
                font-size: 1.08rem;
            }

            .datetime-row,
            .group-category-row {
                flex-direction: column;
                gap: 0;
            }

            .captcha-action-row {
                flex-direction: column;
                align-items: stretch;
                gap: 14px;
            }

            .captcha-box {
                justify-content: center;
                overflow-x: auto;
                width: 100%;
            }

            .schedule-actions {
                flex-direction: column-reverse;
                align-items: stretch;
                width: 100%;
                margin-left: 0;
            }

            .btn-schedule-save,
            .btn-schedule-back {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="schedule-entry-wrapper">
    <div class="schedule-entry-board">
        <div class="schedule-entry-inner">

            <div class="schedule-entry-header">
                <div class="schedule-entry-icon">
                    <i class="bi bi-calendar-event-fill"></i>
                </div>

                <div>
                    <p class="schedule-entry-kicker">Event Management</p>
                    <h1 class="schedule-entry-title">Daily Event Schedule</h1>
                    <p class="schedule-entry-subtitle">Create and publish schedules shown on the public results board.</p>
                </div>
            </div>

            <?php if ($this->session->flashdata('success')): ?>
                <div class="schedule-alert schedule-alert-success">
                    <i class="bi bi-check-circle-fill"></i>
                    <div>
                        <?= html_escape($this->session->flashdata('success')); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="schedule-alert schedule-alert-error">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <div>
                        <?= html_escape($this->session->flashdata('error')); ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="schedule-form-card">
                <div class="form-card-header">
                    <div>
                        <p class="form-card-kicker">Schedule Information</p>
                        <h2 class="form-section-title">Create Daily Event Schedule</h2>
                    </div>

                    <span class="form-status-pill">
                        <i class="bi bi-broadcast-pin"></i>
                        Public Display
                    </span>
                </div>

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

                        <div class="schedule-actions">
                            <a href="<?= base_url(); ?>" class="btn-schedule-back">
                                <i class="bi bi-arrow-left"></i>
                                Back
                            </a>

                            <button type="submit" class="btn-schedule-save">
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

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>
</html>