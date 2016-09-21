
import twitter4j.*;
import twitter4j.conf.ConfigurationBuilder;

import java.util.List;
import java.lang.String;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.net.UnknownHostException;

import com.mongodb.*;

public class SearchTweets {
    
    public static void main(String[] args) {
        ConfigurationBuilder cb = new ConfigurationBuilder();
        cb.setDebugEnabled(true).setOAuthConsumerKey("")
        .setOAuthConsumerSecret("")
        .setOAuthAccessToken("")
        .setOAuthAccessTokenSecret("");
        Twitter twitter = new TwitterFactory(cb.build()).getInstance();
        try {
        	MongoClient mongoClient = new MongoClient();
            DB db = mongoClient.getDB( "twitdata" );
            DBCollection coll = db.getCollection("twit_colec");
        	DateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd");
        	Date today = new Date();
            Date yesterday = new Date(today.getTime() - (1000 * 60 * 60 * 24));
            int len = args.length;
            Query query = new Query(args[0]).since(dateFormat.format(yesterday));
            if (len == 2)
            {
            	query = query.resultType(Query.POPULAR).lang(args[1]);
            }
            else
            {
            	query = query.resultType(Query.POPULAR);
            }
            QueryResult statuses;
            do {
            	statuses = twitter.search(query);
                List<Status> tweets = statuses.getTweets();
                for (Status tweet : tweets) {
                	BasicDBObject doc = new BasicDBObject("User", tweet.getUser().getScreenName())
                			.append("Location", tweet.getUser().getLocation())
                			.append("CreateAt", tweet.getCreatedAt())
                			.append("Contents", tweet.getText());
                	coll.insert(doc);
                }
            } while ((query = statuses.nextQuery()) != null);
            System.exit(0);
        } catch (TwitterException te) {
            te.printStackTrace();
            System.out.println("Failed to search tweets: " + te.getMessage());
            System.exit(-1);
        } catch (UnknownHostException e) {
			e.printStackTrace();
			System.out.println("Failed to search tweets: " + e.getMessage());
            System.exit(-1);
		}
    }
}
