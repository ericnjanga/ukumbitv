<template>
    <main>
        <div class="myaccount-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <aside>
                            <ul class="aside-menu">
                                <li>
                                    <a href="" class="my-account">
                                        <span class="icon icon-man-user"></span>
                                        <span class="list-text">My Account</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="packages">
                                        <span class="icon">
                                            <span class="noicon"></span>
                                        </span>
                                        <span class="list-text">Packages</span>
                                    </a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-sm-2 offset-sm-1">
                        <div class="img-block">
                            <!--<img src="~@/assets/img/user-photo.png" alt="">-->
                            <span class="icon icon-man-user icon-no-photo"></span>
                            <a href="" class="change-photo-butn"><span class="icon icon-pencil-edit-button"></span></a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="account-form-block">
                            <form action="" action="" method="">
                                <div class="input-wrap">
                                    <label>Full name</label>
                                    <input type="text" name="name">
                                </div>
                                <div class="input-wrap">
                                    <label>E-mail</label>
                                    <input type="email" name="email">
                                </div>
                                <div class="input-wrap input-tel">
                                    <label>Phone</label>
                                    <input type="tel" name="usrtel">
                                </div>
                                <a href="" class="change-pas">Change password</a>
                                <button type="submit" class="butn btn-cta1b btn-lg">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
