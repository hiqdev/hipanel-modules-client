import { test } from "@hipanel-core/fixtures";
import BlacklistHelper from "@hipanel-module-client/helper/Blacklist";
import BlacklistCategory from "@hipanel-module-client/helper/category/BlacklistCategory";

test("Correct view Blacklist @hipanel-module-client @osrc", async ({ osrcPage }) => {

    const blacklistHelper = new BlacklistHelper(osrcPage, new BlacklistCategory());

    await blacklistHelper.gotoIndexBlacklist();

    let blacklist = await blacklistHelper.fillBlacklistFromIndexPage(1);
    await blacklistHelper.gotoBlacklistPage(1);

    await blacklistHelper.checkDetailViewData(blacklist);
});
