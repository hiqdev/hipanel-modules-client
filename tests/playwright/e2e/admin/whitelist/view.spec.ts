import { test } from "@hipanel-core/fixtures";
import BlacklistHelper from "@hipanel-module-client/helper/Blacklist";
import WhitelistCategory from "@hipanel-module-client/helper/category/WhitelistCategory";

test("Correct view Whitelist @hipanel-module-client @osrc", async ({ osrcPage }) => {

    const blacklistHelper = new BlacklistHelper(osrcPage, new WhitelistCategory());

    await blacklistHelper.gotoIndexBlacklist();

    await blacklistHelper.gotoBlacklistPage(1);
    let blacklist = await blacklistHelper.fillBlacklistFromIndexPage(1);

    await blacklistHelper.checkDetailViewData(blacklist);
});

